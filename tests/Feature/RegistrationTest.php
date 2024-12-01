<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewUserRegistered;
use Tests\TestCase;
use App\Models\user_regs;
// function generateRandomString($length = 10) {
//     $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
//     $charactersLength = strlen($characters);
//     $randomString = '';

//     for ($i = 0; $i < $length; $i++) {
//         $randomString .= $characters[rand(0, $charactersLength - 1)];
//     }

//     return $randomString;
// }
class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    
//     public function testCreateUser() {
//         $newUser = new user_regs();
//         $newUser->user_name = generateRandomString();
//         $newUser->full_name = generateRandomString();
//         $newUser->birthdate = "1-1-2001";
//         $newUser->phone = generateRandomString();
//         $newUser->address = generateRandomString();
//         $newUser->password = generateRandomString();
//         $newUser->user_image = generateRandomString();
//         $e = generateRandomString();
//         $newUser->email = $e;
//         $newUser->save();
//         // dd($finduser);
//         $this->assertDatabaseHas('user_reg', ['email' => $e]);
//     }
//     /** @test */
//     /** @test */
// public function it_inserts_new_student_and_displays_success_message()
// {


//     // Send a POST request to the store endpoint
//     $response = $this->post('/index', [
//         'full_name' => 'John Doe',
//         'user_name' => 'johndoe',
//         'birthdate' => '1990-01-01',
//         'phone' => '12345678901',
//         'address' => '123 Main St',
//         'password' => 'Password@123',
//         // 'confirm_password' => 'Password@123',
//         'email' => 'johndoe@example.com',
//         'user_image' => '1715881687.png',
//     ]);

//     // Assert that the response status is 302 (redirect)
//     $response->assertStatus(302);

//     // Follow the redirect to get the redirected response
//     $response = $this->get($response->headers->get('Location'));

//     // Assert that the redirected response status is 200
//     $response->assertStatus(200);

//     // Assert that the session has the success message
//     // $this->assertSessionHas('status', 'User Added successfully.');

//     // Assert that the user is added to the database
//     $this->assertDatabaseHas('user_reg', ['user_name' => 'johndoe']);

//     // Assert that the email is sent
//     Mail::assertSent(NewUserRegistered::class, function ($mail) {
//         return $mail->hasTo('not.m7mdd@gmail.com');
//     });
// }
public function testUserRegistrationWithInvalidImageUpload()
    {
        $response = $this->post('/index', [
            'user_image' => UploadedFile::fake()->create('document.pdf', 1000),
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('user_image');
    }
    public function testNewUserRegistration()
    {
        $filePath = 'public\images\1716004774.jpg';
        $file = new UploadedFile($filePath, 'EW6cVh_U8AEkXdLzx.jpg', 'image/jpg', null, true);
    
        $response = $this->post('/index', [
            'full_name' => 'mohammedff',
            'user_name' => 'mo',
            'birthdate' => '2000-01-01',
            'phone' => '12345678910',
            'address' => '123 cc St',
            'password' => 'Password@123',
            'confirm_password' => 'Password@123',
            'email' => 'mm@gmail.com',
            'user_image' =>$file,
        ]);

        $response->assertStatus(200);
        $response->assertJson(['status' => 'success', 'message' => 'User Added successfully.']);
        $this->assertDatabaseHas('user_reg', ['user_name' => 'mo']);
    }
    public function testUserRegistrationValidationForPassword()
    {
        $response = $this->post('/index', [
            'password' => 'falsepassowrd',
            'confirm_password' => 'falsepassowrd',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('password');
    }


    /** @test */
    public function it_requires_all_fields()
    {
        $response = $this->post('/index', []);

        $response->assertSessionHasErrors([
            'full_name', 'user_name', 'birthdate', 'phone', 'address', 'password', 'email', 'user_image'
        ]);
    }

    /** @test */
    public function it_requires_valid_email()
    {
        $response = $this->post('/index', [
            'email' => 'invalid-email'
        ]);

        $response->assertSessionHasErrors(['email']);
    }


}