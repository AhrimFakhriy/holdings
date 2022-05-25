<?php

namespace AhrimFakhriy\Holdings\Tests;

use AhrimFakhriy\Holdings\Models\Holding;
use AhrimFakhriy\Holdings\Tests\Models\File;
use AhrimFakhriy\Holdings\Tests\Models\User;
use Illuminate\Support\Facades\Hash;

class HoldingTest extends TestCase {

    /** @test */
    public function it_can_be_created() {

        $holding = new Holding();
        $holding->holdable()->associate($file = File::factory()->create());
        $holding->save();

        $this->assertDatabaseCount((new Holding)->getTable(), 1);
        $this->assertDatabaseCount((new File)->getTable(), 1);
        $this->assertEquals($file, $holding->holdable);

    }

    /** @test */
    public function it_needs_to_have_holdable() {

        $this->assertThrows(fn () => Holding::create(), \Illuminate\Database\QueryException::class);

    }

    /** @test */
    public function it_can_have_a_user() {

        $holding = new Holding();
        $holding->holdable()->associate($file = File::factory()->create());
        $holding->user()->associate($user = User::factory()->create());
        $holding->save();

        $this->assertDatabaseCount((new Holding)->getTable(), 1);
        $this->assertDatabaseCount((new User)->getTable(), 1);
        $this->assertEquals($user, $holding->user);

    }

    /** @test */
    public function holdables_can_be_passed_to_users() {

        /** @var User */
        $alice = User::factory()->create(['name' => 'Alice']);

        /** @var User */
        $mike = User::factory()->create(['name' => 'Mike']);

        /** @var File */
        $file = File::factory()->create();

        $file->handsTo($alice, from: $alice);

        $this->travel(5)->hours();

        $file->handsTo($mike, from: $alice);

        $this->assertDatabaseCount((new Holding)->getTable(), 2);
        $this->assertEquals(Holding::latest('starts_at')->first(), $file->hold);
        $this->assertNotNull(Holding::first()->ends_at);

    }

}
