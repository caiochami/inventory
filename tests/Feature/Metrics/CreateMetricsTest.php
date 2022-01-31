<?php

namespace Tests\Feature\Metrics;

use App\Http\Livewire\Metrics\Create;
use App\Models\User;
use Livewire\Livewire;
use Tests\TestCase;

class CreateMetricsTest extends TestCase
{
    public function test_it_should_create_new_metric(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        Livewire::test(Create::class)
            ->set('isModalOpen', true)
            ->set('form.name', 'Test Metric')
            ->set('form.symbol', 'TEST')
            ->call('save')
            ->assertSet('isModalOpen', false)
            ->assertSet('form.name', '')
            ->assertSet('form.symbol', '')
            ->assertNoRedirect()
            ->assertNotification('Metric created successfully')
            ->assertHasNoErrors()
            ->assertEmitted('refreshLivewireDatatable');

        $this->assertDatabaseHas('metrics', [
            'name' => 'Test Metric',
            'symbol' => 'TEST',
            'user_id' => $user->id,
        ]);
    }
}
