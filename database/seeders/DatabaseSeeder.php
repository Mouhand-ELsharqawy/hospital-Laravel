<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Appointment;
use App\Models\Billing;
use App\Models\Billingrecord;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Doctortiming;
use App\Models\Medicine;
use App\Models\Order;
use App\Models\Patient;
use App\Models\Payment;
use App\Models\Prescription;
use App\Models\Prescriptionrecord;
use App\Models\Room;
use App\Models\Servicetype;
use App\Models\Treatment;
use App\Models\Treatmentrecord;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(20)->create();
        Department::factory(20)->create();
        Doctor::factory(20)->create();
        Doctortiming::factory(20)->create();
        Medicine::factory(20)->create();
        Patient::factory(20)->create();
        Room::factory(20)->create();
        Servicetype::factory(20)->create();
        Treatment::factory(20)->create();
        Appointment::factory(20)->create();
        Billing::factory(20)->create();
        Billingrecord::factory(20)->create();
        Payment::factory(20)->create();
        Treatmentrecord::factory(30)->create();
        Order::factory(20)->create();
        Prescription::factory(30)->create();
        Prescriptionrecord::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
