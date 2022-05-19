<?php

namespace Database\Factories;
use App\Models\Company;
use App\Models\User;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class UserFactory extends Factory
{
    protected $model = User::class;
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'user_type'=>'seeker',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}

class CompanyFactory extends Factory
{
    protected $model = Company::class;
    public function definition()
    {
        $name = $this->faker->company();
        return [
            'user_id' =>$model = User::all()->random()->id,
            'cname'=> $name, 
            'slug' => Str::slug($name),
            'address'=>$this->faker->address(),
            'phone'=>$this->faker->phoneNumber(),
            'website'=>$this->faker->domainName(),
            'logo'=>'man.jpg',
            'cover_photo'=>'tumblr-image-sizes-banner.png',
            'slogan'=>'learn-earn and grow',
            'description' =>$this->faker->paragraph(rand(2,10)),
        ];
    }
}

class JobFactory extends Factory
{
    protected $model = Job::class;
    public function definition()
    {
        
        return [
            'user_id' =>$model = User::all()->random()->id,
            'company_id'=>$model = Company::all()->random()->id,
            'title'=>$title = $this->faker->text(),
            'slug'=>Str::slug($title),
            'position'=>$this->faker->jobTitle(),
            'address'=>$this->faker->address(),
            'category_id'=> rand(1,5),
            'type'=>'Fulltime',
            'status'=>rand(0,1),
            'description'=>$this->faker->paragraph(rand(2,10)),
            'roles'=>$this->faker->text(),
            'last_date'=>$this->faker->DateTime(),
            'number_of_vacancy'=>rand(1,10),
            'experience'=>rand(1,10),
            'gender'=>$this->faker->randomElement(['male', 'female']),
            'salary'=>rand(10000,50000)
        ];
    }
}