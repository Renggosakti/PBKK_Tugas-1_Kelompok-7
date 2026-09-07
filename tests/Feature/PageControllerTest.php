<?php

namespace Tests\Feature;

use Tests\TestCase;

class PageControllerTest extends TestCase
{
    /**
     * Test Home route returns 200 and renders student profile.
     */
    public function test_home_page_is_accessible_and_renders_student_info(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Arya Rangga');
        $response->assertSee('5025241072');
        $response->assertSee('Kelompok 7');
    }

    /**
     * Test About route returns 200 and renders department profile.
     */
    public function test_about_page_is_accessible_and_renders_department_info(): void
    {
        $response = $this->get('/about');

        $response->assertStatus(200);
        $response->assertSee('Departemen Teknik Informatika');
        $response->assertSee('IABEE');
    }

    /**
     * Test Project Idea route returns 200 and renders Agentic AI concept.
     */
    public function test_project_page_is_accessible_and_renders_agentic_ai_info(): void
    {
        $response = $this->get('/project-idea');

        $response->assertStatus(200);
        $response->assertSee('Synthetix ITS');
        $response->assertSee('Agentic AI');
    }

    /**
     * Test Calculator form page returns 200.
     */
    public function test_calculator_form_page_is_accessible(): void
    {
        $response = $this->get('/calculator');

        $response->assertStatus(200);
        $response->assertSee('Kalkulator Server Dinamis');
    }

    /**
     * Test Calculator addition: /hitung/10/5/tambah -> 15.
     */
    public function test_calculator_addition(): void
    {
        $response = $this->get('/hitung/10/5/tambah');

        $response->assertStatus(200);
        $response->assertSee('15');
        $response->assertSee('Hasil dari 10 tambah 5 adalah 15');
    }

    /**
     * Test Calculator subtraction: /hitung/10/5/kurang -> 5.
     */
    public function test_calculator_subtraction(): void
    {
        $response = $this->get('/hitung/10/5/kurang');

        $response->assertStatus(200);
        $response->assertSee('5');
        $response->assertSee('Hasil dari 10 kurang 5 adalah 5');
    }

    /**
     * Test Calculator multiplication: /hitung/10/5/kali -> 50.
     */
    public function test_calculator_multiplication(): void
    {
        $response = $this->get('/hitung/10/5/kali');

        $response->assertStatus(200);
        $response->assertSee('50');
        $response->assertSee('Hasil dari 10 kali 5 adalah 50');
    }

    /**
     * Test Calculator division: /hitung/10/5/bagi -> 2.
     */
    public function test_calculator_division(): void
    {
        $response = $this->get('/hitung/10/5/bagi');

        $response->assertStatus(200);
        $response->assertSee('2');
        $response->assertSee('Hasil dari 10 bagi 5 adalah 2');
    }

    /**
     * Test Calculator division by zero error handling.
     */
    public function test_calculator_division_by_zero(): void
    {
        $response = $this->get('/hitung/10/0/bagi');

        $response->assertStatus(200);
        $response->assertSee('Pembagian dengan nol tidak diperbolehkan');
    }

    /**
     * Test Calculator unsupported operation error handling.
     */
    public function test_calculator_unsupported_operation(): void
    {
        $response = $this->get('/hitung/10/5/pangkat');

        $response->assertStatus(200);
        $response->assertSee('tidak didukung');
    }

    /**
     * Test Calculator non-numeric input error handling.
     */
    public function test_calculator_non_numeric_input(): void
    {
        $response = $this->get('/hitung/abc/5/tambah');

        $response->assertStatus(200);
        $response->assertSee('Input angka tidak valid');
    }
}
