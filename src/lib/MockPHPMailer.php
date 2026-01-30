<?php

// ---------------------------------------------------------
// MOCK 3RD PARTY LIBRARY (DO NOT MODIFY THIS CLASS)
// This simulates the original PHPMailer library
// ---------------------------------------------------------

class MockPHPMailer {
    private $addresses = [];
    private $subject = '';
    private $body = '';

    public function addAddress($email) {
        $this->addresses[] = $email;
    }

    public function setSubject($subject) {
        $this->subject = $subject;
    }

    public function setBody($body) {
        $this->body = $body;
    }

    public function send() {
        // Simulates successful send
        return true;
    }

}
