<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../index.php'; // Path to the PHP file being tested

class GetCurrentYearTest extends TestCase {

    // Test for getCurrentYear() function
    public function testGetCurrentYear() {
        $currentYear = getCurrentYear();
        $this->assertEquals(date('Y'), $currentYear); // Check if the current year matches
    }

    // Test for getFullDate() function
    public function testGetFullDate() {
        $fullDate = getFullDate();
        $this->assertEquals(date('Y-m-d H:i:s'), $fullDate); // Check if the full date and time matches
    }

    // Test for daysBetweenDates() function
    public function testDaysBetweenDates() {
        // Test with valid dates (start date is earlier than end date)
        $startDate = '2024-12-01';
        $endDate = '2024-12-30';
        $daysDifference = daysBetweenDates($startDate, $endDate);
        $this->assertEquals(29, $daysDifference);  // 30 days in December, minus 1 day

        // Test when the dates are the same (expect 0 days)
        $startDate = '2024-12-01';
        $endDate = '2024-12-01';
        $daysDifference = daysBetweenDates($startDate, $endDate);
        $this->assertEquals(0, $daysDifference);  // Same date, so no difference

        // Test when the end date is earlier than the start date (should return positive days)
        $startDate = '2024-12-30';
        $endDate = '2024-12-01';
        $daysDifference = daysBetweenDates($startDate, $endDate);
        $this->assertEquals(29, $daysDifference);  // Same 29 days difference, swapped order

        // Test for invalid date format (should throw an exception or return a specific error)
        $startDate = 'invalid-date';
        $endDate = '2024-12-30';
        $this->expectException(Exception::class); // Expect an exception for invalid input
        daysBetweenDates($startDate, $endDate);
    }
}
?>
