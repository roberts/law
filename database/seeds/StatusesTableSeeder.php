<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date('Y-m-d H:i:s');
        
        DB::table('statuses')->insert([
            'slug'          => 'lead',
            'title'         => 'Lead',
            'description'   => 'Parent Status for all Lead statuses',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);
        
        DB::table('statuses')->insert([
            'slug'          => 'pre-litigation',
            'title'         => 'Pre-Litigation',
            'description'   => 'Parent Status for all Pre-Litigation statuses',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);
        
        DB::table('statuses')->insert([
            'slug'          => 'litigation',
            'title'         => 'Litigation',
            'description'   => 'Parent Status for all Litigation statuses',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('statuses')->insert([
            'slug'          => 'closed',
            'title'         => 'Closed',
            'description'   => 'Parent Status for all Closed statuses',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('statuses')->insert([
            'slug'          => 'needs-approval',
            'title'         => 'Needs Approval',
            'description'   => 'Matter needs approval.',
            'parent'        => 1,
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('statuses')->insert([
            'slug'          => 'approved',
            'title'         => 'Approved',
            'description'   => 'Matter has been approved by attorney.',
            'parent'        => 1,
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('statuses')->insert([
            'slug'          => 'engagement-sent',
            'title'         => 'Engagement Sent',
            'description'   => 'Clients of this matter has been mailed an engagement letter.',
            'parent'        => 1,
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('statuses')->insert([
            'slug'          => 'engagement-received',
            'title'         => 'Engagement Received',
            'description'   => 'Have received back the engagement letter from all clients on this matter.',
            'parent'        => 1,
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('statuses')->insert([
            'slug'          => 'interview-ready',
            'title'         => 'Interview Ready',
            'description'   => 'Matter is ready for an interview.',
            'parent'        => 2,
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('statuses')->insert([
            'slug'          => 'interview-scheduled',
            'title'         => 'Interview Scheduled',
            'description'   => 'Interviews have been scheduled for all clients of this matter.',
            'parent'        => 2,
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('statuses')->insert([
            'slug'          => 'interview-completed',
            'title'         => 'Interview Completed',
            'description'   => 'Interviews have been completed for all clients of this matter.',
            'parent'        => 2,
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('statuses')->insert([
            'slug'          => 'pre-litigation-settlement',
            'title'         => 'Settlement',
            'description'   => 'Settlement discussions on matter in pre-litigation.',
            'parent'        => 2,
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('statuses')->insert([
            'slug'          => 'ready-to-file',
            'title'         => 'Ready to File',
            'description'   => 'Matter is ready to file lititgation.',
            'parent'        => 2,
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('statuses')->insert([
            'slug'          => 'pleadings',
            'title'         => 'Pleadings',
            'description'   => 'Matter is in Pleadings stage of litigation.',
            'parent'        => 3,
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('statuses')->insert([
            'slug'          => 'written-discovery',
            'title'         => 'Written Discovery',
            'description'   => 'Matter is in Written Discovery stage of litigation.',
            'parent'        => 3,
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('statuses')->insert([
            'slug'          => 'depositions',
            'title'         => 'Depositions',
            'description'   => 'Matter is in Depositions stage of litigation.',
            'parent'        => 3,
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('statuses')->insert([
            'slug'          => 'pre-trial',
            'title'         => 'Pre-Trial',
            'description'   => 'Matter is in Pre-Trial stage of litigation.',
            'parent'        => 3,
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('statuses')->insert([
            'slug'          => 'trial',
            'title'         => 'Trial',
            'description'   => 'Matter is in Trial.',
            'parent'        => 3,
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('statuses')->insert([
            'slug'          => 'appeal',
            'title'         => 'Appeal',
            'description'   => 'Matter is in Appeal stage of litigation.',
            'parent'        => 3,
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('statuses')->insert([
            'slug'          => 'litigation-settlement',
            'title'         => 'Settlement',
            'description'   => 'Settlement discussions on matter in litigation.',
            'parent'        => 3,
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('statuses')->insert([
            'slug'          => 'verdict-won',
            'title'         => 'Verdict Won',
            'description'   => 'Matter closed after verdict was won.',
            'parent'        => 4,
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('statuses')->insert([
            'slug'          => 'verdict-lost',
            'title'         => 'Verdict Lost',
            'description'   => 'Matter closed after verdict was lost.',
            'parent'        => 4,
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('statuses')->insert([
            'slug'          => 'settled',
            'title'         => 'Settled',
            'description'   => 'Matter closed after being settled.',
            'parent'        => 4,
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('statuses')->insert([
            'slug'          => 'withdrawn',
            'title'         => 'Withdrawn',
            'description'   => 'Matter closed after being withdrawn.',
            'parent'        => 4,
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('statuses')->insert([
            'slug'          => 'dismissed',
            'title'         => 'Dismissed',
            'description'   => 'Matter closed after being dismissed.',
            'parent'        => 4,
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);
        
    }
}
