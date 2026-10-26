<?php

namespace Tests\Feature;

use App\Models\Report;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReportTest extends TestCase
{
    use RefreshDatabase;

    public function test_unauthenticated_user_cannot_access_reports(): void
    {
        $response = $this->get('/reports');

        $response->assertRedirect('/login');
    }

    public function test_user_can_view_reports_page(): void
    {
        $user = User::factory()->create();

        Report::factory()->create([
            'user_id' => $user->id,
            'title' => 'Kendala tombol klik',
        ]);

        $response = $this->actingAs($user)->get('/reports');

        $response->assertOk();
        $response->assertSee('Daftar Laporan Anda');
        $response->assertSee('Kendala tombol klik');
    }

    public function test_user_can_view_create_report_page(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/reports/create');

        $response->assertOk();
        $response->assertSee('Formulir Laporan Baru');
    }

    public function test_user_can_create_a_report(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/reports', [
            'title' => 'Server lambat pada pagi hari',
            'category' => 'bug',
            'description' => 'Saat mengakses dashboard jam 8 pagi, response time terasa lebih dari 5 detik.',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('reports.index'));

        $this->assertDatabaseHas('reports', [
            'user_id' => $user->id,
            'title' => 'Server lambat pada pagi hari',
            'category' => 'bug',
            'status' => 'menunggu',
        ]);
    }

    public function test_report_requires_valid_data(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/reports', [
            'title' => '',
            'category' => 'invalid_category',
            'description' => 'pendek',
        ]);

        $response->assertSessionHasErrors(['title', 'category', 'description']);
    }

    public function test_user_can_view_their_own_report(): void
    {
        $user = User::factory()->create();
        $report = Report::factory()->create([
            'user_id' => $user->id,
            'title' => 'Laporan Khusus Saya',
            'description' => 'Ini adalah isi deskripsi lengkap laporan.',
        ]);

        $response = $this->actingAs($user)->get(route('reports.show', $report));

        $response->assertOk();
        $response->assertSee('Laporan Khusus Saya');
        $response->assertSee('Ini adalah isi deskripsi lengkap laporan.');
    }

    public function test_user_cannot_view_another_users_report(): void
    {
        $userA = User::factory()->create();
        $userB = User::factory()->create();

        $reportOfUserB = Report::factory()->create([
            'user_id' => $userB->id,
        ]);

        $response = $this->actingAs($userA)->get(route('reports.show', $reportOfUserB));

        $response->assertStatus(403);
    }
}
