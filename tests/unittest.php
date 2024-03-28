<?php

require_once 'vendor/autoload.php'; // Adjust the path to autoload.php as per your project structure

use PHPUnit\Framework\TestCase;

class unittest extends TestCase
{
    public function testSuccessfulBookingSubmission()
    {
        // Start output buffering
        ob_start();
        
        // Simulate form submission with valid data
        $_POST['submit'] = true;
        $_POST['name'] = 'John Doe';
        $_POST['email'] = 'john@example.com';
        $_POST['phonenumber'] = '1234567890';
        $_POST['bookingdate'] = '2024-04-01';
        $_POST['bookingtime'] = '14:00:00';
        $_POST['noofadults'] = '2';
        $_POST['noofchildrens'] = '1';
    
        // Include the script to test
        require_once 'index.php';
    
        $output = ob_get_clean();
    
        // Assert that success message is displayed
        $this->assertStringContainsString('Your order sent successfully.', $output);
    }
    
    public function testFailedBookingSubmission()
    {
        ob_start();

        // Simulate form submission with invalid data
        $_POST['submit'] = true;
        $_POST['name'] = 'Hello World'; 
        $_POST['email'] = 'john@example.com';
        $_POST['phonenumber'] = '1234567890';
        $_POST['bookingdate'] = '';
        $_POST['bookingtime'] = '';
        $_POST['noofadults'] = '2';
        $_POST['noofchildrens'] = '1';

        require_once 'index.php'; 
        $output = ob_get_clean();

        $this->assertStringContainsString('Your order sent successfully.', $output);
    }

    public function testBookingNumberGeneration()
    {
         // Start output buffering
         ob_start();
        
         // Simulate form submission with valid data
         $_POST['submit'] = true;
         $_POST['name'] = 'John Doe';
         $_POST['email'] = 'john@example.com';
         $_POST['phonenumber'] = '1234567890';
         $_POST['bookingdate'] = '2024/04-01';
         $_POST['bookingtime'] = '2:00 PM';
         $_POST['noofadults'] = '2';
         $_POST['noofchildrens'] = '1';
     
         // Include the script to test
         require_once 'index.php';
     
         $output = ob_get_clean();
     
         // Assert that success message is displayed
         $this->assertStringContainsString('Booking Number is', $output);
    }

    public function testEmptyFormSubmission()
    {
        // Simulate form submission with empty data
        $_POST['name'] = '';
        $_POST['email'] = '';
        $_POST['phonenumber'] = '';
        $_POST['bookingdate'] = '';
        $_POST['bookingtime'] = '';
        $_POST['noofadults'] = '';
        $_POST['noofchildrens'] = '';

        ob_start();
        require_once 'index.php'; // Include the application file
        $output = ob_get_clean();

        // Assert that success message is not displayed
        $this->assertStringNotContainsString('Empty Form Submitted', $output);
    }

    public function testSearchResultWithExactNumber()
    {
        // Simulate accessing the booking status page without providing a booking number
        ob_start();
        $_POST['searchdata'] = '9806518409';
        require_once 'search-result.php'; // Include the booking status page
        $output = ob_get_clean();

        // Assert that an error message is displayed
        $this->assertStringContainsString('Data Found', $output);
    }

}
