<?php
// Observer interface
interface Observer {
    public function update($data);
}

// Concrete Observer
class EmailNotifier implements Observer {
    public function update($data) {
        // DO CODE FOR EMAIL SEND
        echo "Sending email notification: $data<br />";
    }
}

class SMSNotifier implements Observer {
    public function update($data) {
        // DO CODE FOR SMS SEND
        echo "Sending SMS notification: $data<br />";
    }
}

// Subject (Observable)
class Order {
    private array $observers = [];

    public function attach(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer) {
        $index = array_search($observer, $this->observers, true);
        if ($index !== false) unset($this->observers[$index]);
    }

    public function notify($data) {
        foreach ($this->observers as $observer) {
            $observer->update($data);
        }
    }

    public function placeOrder($orderId) {
        echo "Order #$orderId placed.<br />";
        $this->notify("Order #$orderId has been placed");
    }
}

// Usage
$order = new Order();
$order->attach(new EmailNotifier());
$order->attach(new SMSNotifier());

$order->placeOrder(101);

?>