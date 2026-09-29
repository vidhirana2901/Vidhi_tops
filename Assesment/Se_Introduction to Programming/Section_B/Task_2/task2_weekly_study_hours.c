/*
 * Assessment M3-A1: Software Engineering (Intro to Programming)
 * Section B — Practical Coding Tasks
 * Task 2: Weekly Study Hours Analyser
 *
 * Description: Records daily study hours for 7 days into a float array,
 * validates daily inputs (0 to 24 hours) with re-prompts, computes total,
 * daily average, peak study day, and renders an asterisk progress bar per day.
 */

#include <stdio.h>

#define DAYS 7

int main(void) {
    float study_hours[DAYS];
    float total_hours = 0.0f;
    float average_hours = 0.0f;
    float max_hours = -1.0f;
    int max_day = 1;
    int i, j, stars;

    printf("==============================================\n");
    printf("        WEEKLY STUDY HOURS ANALYSER           \n");
    printf("==============================================\n\n");
    printf("Please enter the study hours for each of the 7 days (0.0 to 24.0):\n\n");

    /* For loop to accept 7 daily float values with rejection & re-prompting */
    for (i = 0; i < DAYS; i++) {
        while (1) {
            printf("Enter study hours for Day %d: ", i + 1);
            if (scanf("%f", &study_hours[i]) != 1) {
                printf("  [!] Invalid input format. Please enter a numerical value.\n");
                /* Clear input stream */
                while (getchar() != '\n');
                continue;
            }

            /* Validation: Reject and re-prompt if negative or > 24 */
            if (study_hours[i] < 0.0f || study_hours[i] > 24.0f) {
                printf("  [!] Invalid entry (%.2f hrs). Daily hours must be between 0.0 and 24.0.\n", study_hours[i]);
                printf("      Please try again.\n");
            } else {
                break; /* Valid input */
            }
        }

        /* Accumulate weekly total */
        total_hours += study_hours[i];

        /* Check for highest study hours */
        if (study_hours[i] > max_hours) {
            max_hours = study_hours[i];
            max_day = i + 1;
        }
    }

    /* Compute daily average */
    average_hours = total_hours / (float)DAYS;

    /* Display Performance Summary */
    printf("\n==============================================\n");
    printf("             PERFORMANCE SUMMARY              \n");
    printf("==============================================\n");
    printf("Weekly Total Study Hours : %.2f hours\n", total_hours);
    printf("Daily Average Study Hours: %.2f hours/day\n", average_hours);
    printf("Peak Study Day           : Day %d (%.2f hours)\n", max_day, max_hours);
    printf("----------------------------------------------\n");

    /* Display Simple Visual Bar (one asterisk per hour truncated to nearest integer) */
    printf("DAILY VISUAL STUDY BAR (* = 1 Hour Studied):\n");
    for (i = 0; i < DAYS; i++) {
        stars = (int)study_hours[i]; /* Truncated to nearest integer */
        printf("Day %d: ", i + 1);
        if (stars == 0) {
            printf("(less than 1 hour)");
        } else {
            for (j = 0; j < stars; j++) {
                printf("*");
            }
        }
        printf(" (%.1f hrs)\n", study_hours[i]);
    }
    printf("==============================================\n");

    return 0;
}
