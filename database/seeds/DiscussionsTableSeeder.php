<?php

use Illuminate\Database\Seeder;
use App\Discussion;

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t1 = 'Implementing OAUTH2 with laravel passport';
        $t2 = 'Pagination in vuejs not working correctly';
        $t3 = 'Vuejs event listeners for child components';
        $t4 = 'Laravel homestead error - undetected database';
        
        $d1 = [
            'title' => $t1,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut convallis ligula ut quam consectetur, sit amet lobortis orci dictum. Duis non porttitor nisl, nec elementum lacus. Cras faucibus dui ut purus aliquam, eget tincidunt tortor tristique. Mauris maximus magna id felis tempus, eu iaculis nunc semper. Integer sodales ipsum id sem consequat, id lobortis lacus fermentum. Ut lacus neque, feugiat vel commodo at, mollis sed quam. Suspendisse potenti. Praesent pellentesque maximus placerat. Mauris ac turpis quis dui semper scelerisque. Curabitur euismod laoreet lorem vitae condimentum.',
            'channel_id' => 1,
            'user_id' => 2,
            'slug' => str_slug($t1),
        ];
        
        $d2 = [
            'title' => $t2,
            'content' => 'Cras eu tempor metus. Nunc commodo nibh vitae fringilla ultricies. Mauris tincidunt ultrices nisl, quis fringilla tortor semper at. Fusce ullamcorper nulla at nibh tempus feugiat. Nam et iaculis dolor. Proin et justo lectus. Sed pulvinar accumsan interdum. Vivamus varius lacus id tellus congue, non placerat augue molestie. Fusce eleifend eget neque vitae efficitur. Integer ex quam, lacinia quis congue vitae, volutpat ut sapien. Aliquam dapibus euismod eleifend. Ut congue quam et mi vestibulum ornare.',
            'channel_id' => 2,
            'user_id' => 1,
            'slug' => str_slug($t2),
        ];
        
        $d3 = [
            'title' => $t3,
            'content' => 'Donec et venenatis mauris, vel pulvinar urna. Phasellus accumsan lorem quis tellus commodo, nec porttitor arcu imperdiet. Ut bibendum interdum ipsum, vitae cursus sem viverra at. Duis eu molestie magna, ac ultricies eros. Nulla sit amet cursus justo. Nullam maximus in magna nec dignissim. Nulla id massa tempus risus faucibus consectetur. In feugiat pharetra tortor vulputate viverra. Suspendisse turpis risus, efficitur ut semper et, vehicula tincidunt velit. Aliquam leo mi, maximus sagittis massa non, blandit aliquam purus.',
            'channel_id' => 2,
            'user_id' => 1,
            'slug' => str_slug($t3),
        ];
        
        $d4 = [
            'title' => $t4,
            'content' => 'Duis tempor sapien sit amet imperdiet consequat. Donec faucibus tristique sem eget viverra. In tellus orci, dictum vitae enim non, luctus scelerisque nisl. Cras vitae nisl non tellus porta porttitor ut id sapien. Duis congue leo in neque eleifend vestibulum. Vivamus a egestas lorem. Ut fermentum interdum sollicitudin. Nullam congue orci est, nec vehicula tortor efficitur eu. Ut orci nunc, molestie eu cursus et, vulputate sit amet libero.',
            'channel_id' => 5,
            'user_id' => 1,
            'slug' => str_slug($t4),
        ];
        
        Discussion::create($d1);
        Discussion::create($d2);
        Discussion::create($d3);
        Discussion::create($d4);
    }
}
