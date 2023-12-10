<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\ClockIn;
use Livewire\Component;

class UserList extends Component
{
    public $perPage = 10;
    public $search = '';
    public $clockInTime;

    public function mount()
    {
        $this->clockInTime = ClockIn::where('user_id', auth()->id())->latest('created_at')->value('clock_in');
    }

    public function clockIn()
    {

        auth()->user()->update(['clock_in' => now()]);

        ClockIn::create([
            'user_id' => auth()->id(),
            'clock_in' => now(),
        ]);

        return redirect()->route('dashboard');
    }

    public function clockOut()
    {
        $latestSession = ClockIn::where('user_id', auth()->id())->latest('created_at')->first();

        if ($latestSession) {
            $latestSession->update(['clock_out' => now()]);
        }
        auth()->user()->update(['clock_in' => null]);

        // ive added a column for total_clock_time in the clockins table
        // this will calculate the total time between clocking in and out
        $totalClockTime = now()->diff($latestSession->clock_in)->format('%h uur %i minuten');
        $latestSession->update(['total_clock_time' => $totalClockTime]);

        return redirect()->route('dashboard');
    }

    public function render()
    {
        $elapsedTime = $this->clockInTime ? now()->diff($this->clockInTime)->format('%h uur %i minuten') : null;



        return view('livewire.user-list', [
            'users' => User::search($this->search)->paginate($this->perPage),
            'elapsedTime' => $elapsedTime,
            'clockins' => ClockIn::where('user_id', auth()->id())->get(),
        ]);
    }
}
