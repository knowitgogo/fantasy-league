<?php

namespace Tests\Feature;

use Tests\TestCase;

class LocalizationTest extends TestCase
{
    public function test_english_is_the_default_locale(): void
    {
        $this->get('/login')
            ->assertOk()
            ->assertSee('lang="en"', false)
            ->assertSee('Email');
    }

    public function test_user_can_switch_to_dutch(): void
    {
        $this->from('/login')
            ->get('/lang/nl')
            ->assertRedirect('/login')
            ->assertSessionHas('locale', 'nl');

        $this->get('/login')
            ->assertOk()
            ->assertSee('lang="nl-NL"', false)
            ->assertSee('E-mailadres')
            ->assertSee('Inloggen');
    }

    public function test_unsupported_locale_is_rejected(): void
    {
        $this->get('/lang/fr')->assertNotFound();
    }

    public function test_validation_messages_are_localized_in_dutch(): void
    {
        $this->withSession(['locale' => 'nl'])
            ->post('/login', [])
            ->assertSessionHasErrors([
                'email' => 'e-mailadres is verplicht.',
                'password' => 'wachtwoord is verplicht.',
            ]);
    }
}
