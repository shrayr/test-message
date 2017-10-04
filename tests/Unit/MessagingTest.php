<?php

namespace Tests\Unit;

use App\User;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use Tests\TestCase;


class MessagingTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAddUser()
    {
        $response = $this->get(env('APP_URL'));
        $response->assertStatus(200);

        $user = factory(User::class)->create();
        $response = $this->get(env('APP_URL').'/home');
        $response->assertStatus(302);

        $response = $this->actingAs($user)->get(env('APP_URL').'/home');
        $response->assertStatus(200);

    }


    public function testNewUserRegistration()
    {
            $this->visit(env('APP_URL') .'/register')
                ->type('Test_User', 'name')
                ->type('test' . rand(1000000, 999999999) . '@test.com', 'email')
                ->type('qwerty', 'password')
                ->type('qwerty', 'password_confirmation')
                ->press('Register')
                ->seePageIs(env('APP_URL') . '/home');
    }



    public function testAddMessage(){
        $user = factory(User::class)->create();
        $thread = factory(Thread::class)->create();
        factory(Participant::class)->create([
            'thread_id'=> $thread->id,
        ]);
        factory(Message::class, 3)->create([
        'thread_id'=> $thread->id,
        'user_id'=> $user->id
        ]);
        $response = $this->actingAs($user)->get(env('APP_URL').'/messages/' . $thread->id);
        $response->assertStatus(200);
    }




}
