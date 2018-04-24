<?php

use Illuminate\Database\Seeder;
use App\Reply;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r1 = [
            'user_id' => 1,
            'discussion_id' => 1,
            'content' => 'Donec commodo aliquam sapien ultricies placerat. Suspendisse tristique dapibus faucibus. Sed nibh sapien, dictum non sapien eu, hendrerit egestas turpis. Suspendisse viverra, velit a iaculis condimentum, eros erat dictum erat, eget varius ipsum lorem eget nunc. Donec dictum, diam varius dictum hendrerit, massa sem porttitor erat, sit amet placerat leo augue iaculis odio. Nam lacinia metus neque. Integer elementum sodales placerat. Aenean pretium, lectus eget consequat condimentum, urna sem tristique dolor, id iaculis enim felis sit amet libero. Curabitur pellentesque nisi at sapien interdum hendrerit in faucibus ex. Ut sed ultrices urna. Vivamus eget consequat quam. Aenean ac purus dolor.',
        ];
        
        $r2 = [
            'user_id' => 1,
            'discussion_id' => 2,
            'content' => 'Duis tempus metus metus, non egestas diam elementum sit amet. In at magna eget lorem luctus scelerisque. Fusce eu dui nibh. Sed rhoncus condimentum massa, nec ultrices nunc faucibus non. Aliquam id libero felis. Integer in ultrices nulla. Curabitur blandit condimentum quam nec tempor. Vestibulum quis consectetur odio, ut varius leo. Pellentesque hendrerit orci ac fringilla auctor. Donec dui libero, ullamcorper sed dictum eu, vestibulum et urna. Etiam ac egestas ante, nec maximus turpis. Donec pharetra hendrerit sapien.',
        ];
        
        $r3 = [
            'user_id' => 2,
            'discussion_id' => 3,
            'content' => 'Morbi pharetra facilisis aliquet. Proin luctus molestie ipsum et facilisis. Morbi non eros nisl. Aliquam erat volutpat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In pretium nulla neque, id malesuada augue feugiat venenatis. Vestibulum tincidunt sagittis convallis. Duis maximus nunc dolor, sed pharetra dui pharetra nec. Morbi quis pharetra orci. Mauris vel mi vehicula, mollis lectus dictum, consequat arcu. Sed dignissim tincidunt lectus ac commodo. Morbi nec efficitur sem, vel facilisis eros.',
        ];
        
        $r4 = [
            'user_id' => 2,
            'discussion_id' => 4,
            'content' => 'Pellentesque scelerisque non turpis in malesuada. Curabitur cursus tincidunt purus. Aliquam laoreet tortor et pretium tristique. Donec ac metus elementum, malesuada quam eget, vehicula nisl. Proin at luctus mi. Pellentesque est elit, blandit suscipit lorem non, pharetra aliquet augue. Vestibulum posuere elementum lorem, vel commodo arcu maximus eget. Aenean non lorem dui.',
        ];
        
        Reply::create($r1);
        Reply::create($r2);
        Reply::create($r3);
        Reply::create($r4);
    }
}
