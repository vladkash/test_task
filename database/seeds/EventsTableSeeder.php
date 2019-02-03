<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = \App\User::whereHas('role', function ($query) {
            $query->client();
        })->get();

        foreach ($clients as $client) {
            $this->createEvent($client);
        }

    }

    private function createEvent($client)
    {
        factory(App\Event::class)->create([
            'user_id' => $client->id
        ])->each(function ($event) {
            for ($i = 0; $i <= 2; $i++) {
                $event->photos()->save(factory(App\Photo::class)->create([
                    'photoable_type' => 'App\Event',
                    'photoable_id' => $event->id
                ]));
            }
        });
    }
}
