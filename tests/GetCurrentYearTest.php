<?php
// Inclusion de la classe de base de PHPUnit pour les tests unitaires...
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../index.php'; // Inclusion du fichier PHP à tester

// Déclaration de la classe de test GetCurrentYearTest qui étend TestCase de PHPUnit.
class GetCurrentYearTest extends TestCase {

    // Test de la fonction getCurrentYear()
    public function testGetCurrentYear() {
        // Appel de la fonction getCurrentYear() pour obtenir l'année actuelle.
        $currentYear = getCurrentYear();
        // Assertion : On vérifie que l'année renvoyée par getCurrentYear() est égale à l'année actuelle.
        // La fonction date('Y') retourne l'année en cours au format 'Y' (par exemple, 2025).
        $this->assertEquals(date('Y'), $currentYear); // Check if the current year matches
    }

   // Test de la fonction getFullDate()
    public function testGetFullDate() {
        // Appel de la fonction getFullDate() pour obtenir la date et l'heure actuelles.
        $fullDate = getFullDate();
        // Assertion : On vérifie que la date et l'heure renvoyées par getFullDate() correspondent à la date et heure actuelles.
        // La fonction date('Y-m-d H:i:s') génère une chaîne contenant l'année, le mois, le jour, l'heure, la minute et la seconde.
        $this->assertEquals(date('Y-m-d H:i:s'), $fullDate); // Check if the full date and time matches
    }

    // Test de la fonction daysBetweenDates()
    public function testDaysBetweenDates() {
        // Test avec des dates valides où la date de début est antérieure à la date de fin.
        $startDate = '2024-12-01';  // Date de début
        $endDate = '2024-12-30';    // Date de fin
         // Appel de la fonction daysBetweenDates() pour calculer la différence en jours entre startDate et endDate.
        $daysDifference = daysBetweenDates($startDate, $endDate);
        // Assertion : On vérifie que la différence en jours est bien de 29 (30 jours en décembre, moins 1).
        $this->assertEquals(29, $daysDifference);  // 30 days in December, minus 1 day

        // Test avec deux dates identiques (on s'attend à ce que la différence soit de 0 jours).
        $startDate = '2024-12-01';
        $endDate = '2024-12-01';
        // Appel de la fonction daysBetweenDates() pour calculer la différence entre les deux mêmes dates.
        $daysDifference = daysBetweenDates($startDate, $endDate);
        // Assertion : On vérifie que la différence est bien de 0 jours, puisque les dates sont identiques.
        $this->assertEquals(0, $daysDifference);  // Same date, so no difference

        // Test lorsque la date de fin est antérieure à la date de début (l'ordre des dates est inversé).
        $startDate = '2024-12-30';
        $endDate = '2024-12-01';
        // Appel de la fonction daysBetweenDates() pour calculer la différence entre ces deux dates inversées.
        $daysDifference = daysBetweenDates($startDate, $endDate);
        // Assertion : On vérifie que la différence en jours reste la même, indépendamment de l'ordre des dates.
        // La différence entre le 1er décembre et le 30 décembre est toujours de 29 jours.
        $this->assertEquals(29, $daysDifference);  // Same 29 days difference, swapped order

        // Test pour vérifier le cas d'une date invalide.
        // Ici, nous utilisons une chaîne de caractères qui ne correspond à aucune date valide.      
        $startDate = 'invalid-date';
        $endDate = '2024-12-30';
        // On attend qu'une exception soit lancée lorsque la fonction reçoit une date invalide.
        // La méthode expectException() permet de spécifier que l'on attend une exception de type Exception.
        $this->expectException(Exception::class); // Expect an exception for invalid input
        // Appel de la fonction avec une date invalide, ce qui devrait provoquer une exception.
        daysBetweenDates($startDate, $endDate);
    }
}
?>
