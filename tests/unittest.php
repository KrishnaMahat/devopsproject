<?php

require_once 'vendor/autoload.php'; // Adjust the path to autoload.php as per your project structure

use PHPUnit\Framework\TestCase;

class unittest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        // Reset $_POST data before each test
        $_POST = [];
    }

    public function testSuccessfulBookingSubmission()
    {
        // Start output buffering
        ob_start();
        
        // Simulate form submission with valid data
        $_POST['submit'] = true;
        $_POST['name'] = 'Ram Mahat'; 
        $_POST['email'] = 'john@example.com';
        $_POST['phone'] = '9806518409';
        $_POST['bookdate'] = '2026-04-01';
        $_POST['booktime'] = '18:00:00';
        $_POST['noofadults'] = '7';
        $_POST['noofchildrens'] = '6';
    
        // Include the script to test
        require_once 'index.php';
    
        $output = ob_get_clean();
    
        // Assert that success message is displayed
        $this->assertStringContainsString('Your order sent successfully.', $output);

        ob_end_flush();

    }

    public function testAdminLoginPage()
    {        
        // Start output buffering to capture header output
        ob_start();

        // Include the script to test
        require_once 'admin/index.php';
        $output = ob_get_clean();
        
        // Assert that the header output contains the expected redirection
        $this->assertStringContainsString('Sign in to start your session', $output);

        ob_end_flush();

    }

    public function testEmptyEmailSubmission()
    {
        // Simulate form submission with empty data
        $_POST['submit'] = true;
        $_POST['name'] = 'Ram Mahat'; 
        $_POST['email'] = '';
        $_POST['phone'] = '9806518409';
        $_POST['bookdate'] = '2026-04-01';
        $_POST['booktime'] = '18:00:00';
        $_POST['noofadults'] = '7';
        $_POST['noofchildrens'] = '6';

        ob_start();
        require_once 'index.php'; // Include the application file
        $output = ob_get_clean();

        // Assert that success message is not displayed
        $this->assertStringNotContainsString('Empty Form Submitted', $output);

        ob_end_flush();

    }

    public function testEmptyFormSubmission()
    {
        // Simulate form submission with empty data
        $_POST['submit'] = true;
        $_POST['name'] = '';
        $_POST['email'] = '';
        $_POST['phone'] = '';
        $_POST['bookdate'] = '';
        $_POST['booktime'] = '';
        $_POST['noofadults'] = '';
        $_POST['noofchildrens'] = '';

        ob_start();
        require_once 'index.php'; // Include the application file
        $output = ob_get_clean();

        // Assert that success message is not displayed
        $this->assertStringNotContainsString('Empty Form Submitted', $output);

        ob_end_flush();

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

        ob_end_flush();

    }
}
