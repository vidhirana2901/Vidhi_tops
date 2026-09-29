/*
 * Assessment M3-A1: Software Engineering (Intro to Programming)
 * Section B — Practical Coding Tasks
 * Task 1: Grade Band Checker
 *
 * Description: Console program that accepts a student's percentage score,
 * validates the range (0-100), and assigns a letter grade (A, B, C, D, F)
 * with a motivational message using if-else if ladder.
 */

#include <stdio.h>
#include <stdlib.h>

int main(void) {
    float percentage;

    printf("=========================================\n");
    printf("        STUDENT GRADE BAND CHECKER       \n");
    printf("=========================================\n\n");

    printf("Enter student percentage score (0 - 100): ");
    if (scanf("%f", &percentage) != 1) {
        printf("\n[ERROR]: Invalid input! Please enter a numerical score.\n");
        return 1;
    }

    /* Range Validation: score must be between 0 and 100 inclusive */
    if (percentage < 0.0f || percentage > 100.0f) {
        printf("\n[ERROR]: Score %.2f is outside the valid range (0 to 100).\n", percentage);
        printf("Exiting program gracefully...\n");
        return 1;
    }

    printf("\n-----------------------------------------\n");
    printf("Score Entered: %.2f%%\n", percentage);
    printf("-----------------------------------------\n");

    /* Grade determination using if - else if ladder */
    if (percentage >= 90.0f) {
        printf("Assigned Grade: A\n");
        printf("Feedback      : A - Outstanding performance! Excellent work.\n");
    } else if (percentage >= 75.0f) {
        printf("Assigned Grade: B\n");
        printf("Feedback      : B - Good work! Keep pushing.\n");
    } else if (percentage >= 60.0f) {
        printf("Assigned Grade: C\n");
        printf("Feedback      : C - Satisfactory effort! Room for steady improvement.\n");
    } else if (percentage >= 45.0f) {
        printf("Assigned Grade: D\n");
        printf("Feedback      : D - Passed! Need to work harder to reach the next band.\n");
    } else {
        printf("Assigned Grade: F\n");
        printf("Feedback      : F - Needs significant improvement. Don't give up, stay determined!\n");
    }

    printf("=========================================\n");
    return 0;
}
