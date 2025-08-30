<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Modules\Notes\Entities\Note;
use App\User;

class NotePolicyTest extends TestCase
{
    use RefreshDatabase; // assumes migrations can run in test env

    protected function setUp(): void
    {
        parent::setUp();
        // If needed seed roles
    }

    public function test_regular_user_cannot_view_others_note()
    {
        $owner = User::factory()->create(['role_id' => 2]);
        $other = User::factory()->create(['role_id' => 2]);
        $note = Note::create([
            'title' => 'Secret',
            'type' => 'expense',
            'content' => 'Body',
            'created_by' => $owner->id,
        ]);
        $this->actingAs($other);
        $response = $this->get(route('notes.show', $note));
        $response->assertStatus(403);
    }

    public function test_owner_can_view_note()
    {
        $owner = User::factory()->create(['role_id' => 2]);
        $note = Note::create([
            'title' => 'Mine',
            'type' => 'income',
            'content' => 'Body',
            'created_by' => $owner->id,
        ]);
        $this->actingAs($owner);
        $this->get(route('notes.show', $note))->assertStatus(200);
    }

    public function test_super_admin_can_view_any_note()
    {
        $super = User::factory()->create(['role_id' => 1]);
        $other = User::factory()->create(['role_id' => 3]);
        $note = Note::create([
            'title' => 'General',
            'type' => 'event',
            'content' => 'Body',
            'created_by' => $other->id,
        ]);
        $this->actingAs($super);
        $this->get(route('notes.show', $note))->assertStatus(200);
    }

    public function test_create_with_polymorphic_fields_optional()
    {
        $user = User::factory()->create(['role_id' => 2]);
        $this->actingAs($user);
        $response = $this->post(route('notes.store'), [
            'title' => 'Poly',
            'type' => 'incident',
            'content' => 'Body',
            'quantity' => 1,
            'amount' => 10,
            // no noteable_* provided
        ]);
        $response->assertRedirect(route('notes.index'));
        $this->assertDatabaseHas('notes', ['title' => 'Poly', 'noteable_id' => null]);
    }
}
