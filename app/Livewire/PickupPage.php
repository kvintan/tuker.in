<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Pickup;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class PickupPage extends Component
{
    public $name, $phoneNumber, $address;
    public $rubbish = '';
    public $weight = 0;
    public $pickupDate;
    public $total = 0;
    public $showConfirmation = false;

    // Harga per jenis sampah
    protected $rates = [
        'plastic' => 5000,
        'paper' => 5000,
        'metal' => 3500,
        'elektronik' => 5000,
    ];

    public function updated($propertyName)
    {
        if (in_array($propertyName, ['rubbish', 'weight'])) {
            $this->calculateTotal();
        }
    }

    public function confirmFinal()
    {
        Pickup::create([
            'user_id'      => Auth::id(),
            'name'         => $this->name,
            'phone_number' => $this->phoneNumber,
            'address'      => $this->address,
            'pickup_date'  => Carbon::parse($this->pickupDate)->format('Y-m-d'),
            'type'         => $this->rubbish,
            'weight'       => $this->weight,
            'price'        => $this->total,
            'status'       => 'pending',
        ]);

        session()->flash('message', 'Pickup successfully scheduled!');
        return redirect()->to('/');
    }

    public function calculateTotal()
    {
        if (isset($this->rates[$this->rubbish])) {
            $this->total = $this->rates[$this->rubbish] * $this->weight;
        } else {
            $this->total = 0;
        }
    }

    public function getFormattedTotalProperty()
    {
        return number_format($this->total, 0, ',', '.');
    }

    public function submitForm()
    {
        $this->calculateTotal();
        $this->showConfirmation = true;
    }

    public function render()
    {
        return view('livewire.pickup-page');
    }
}
