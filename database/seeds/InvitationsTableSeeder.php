<?php

use App\Invitation;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class InvitationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('invitations')->truncate();

        Invitation::create([
            'created_by' => 2,
            'invitee_id' => 1,
            'invitee_email' => 'bob@flowgig.com',
            'message' => 'Always wanted you in the band, Bob!',
            'status' => 'expired',
            'status_set_at' => '2017-01-01 13:47:13',
            'invitational_id' => 3,
            'invitational_type' => 'band'
        ]);

        Invitation::create([
            'created_by' => 2,
            'invitee_id' => 1,
            'invitee_email' => 'bob@flowgig.com',
            'message' => 'Trying again, Bob!',
            'status' => 'pending',
            'status_set_at' => Carbon::now(),
            'invitational_id' => 3,
            'invitational_type' => 'band'
        ]);

        Invitation::create([
            'created_by' => 2,
            'invitee_id' => 1,
            'invitee_email' => 'bob@flowgig.com',
            'message' => 'We need you and your telecaster to twang things up!',
            'status' => 'pending',
            'status_set_at' => Carbon::now(),
            'invitational_id' => 1,
            'invitational_type' => 'gig'
        ]);
    }
}
