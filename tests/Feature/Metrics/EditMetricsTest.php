<?php

namespace Tests\Feature\Metrics;

use App\Http\Livewire\Metrics\Edit;
use App\Models\Metric;
use App\Models\User;
use Livewire\Livewire;
use Tests\TestCase;

class EditMetricsTest extends TestCase
{
    public function test_it_should_cupdate_existing_metric(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $metric = Metric::factory()->create();

        Livewire::test(Edit::class, ['metric' => $metric])
            ->set('isModalOpen', true)
            ->set('form.name', 'Test Metric')
            ->set('form.symbol', 'TEST')
            ->call('save')
            ->assertSet('isModalOpen', false)
            ->assertNoRedirect()
            ->assertNotification('Metric updated successfully')
            ->assertHasNoErrors()
            ->assertEmitted('refreshLivewireDatatable');

        $metric->refresh();

        $this->assertEquals('Test Metric', $metric->name);

        $this->assertEquals('test', $metric->symbol);
    }
}
