/*
 * Assessment M3-A1: Software Engineering (Intro to Programming)
 * Section C — Mini Capstone Project
 * Mini Project: Student Productivity Tracker
 *
 * Description: Console-based Student Productivity Tracker that logs daily study hours
 * across subjects for a full week (7 days), combining arrays, structures, functions,
 * and file handling. Generates performance statistics, text-based progress charts,
 * and exports logs to productivity_log.txt on exit.
 */

#include <stdio.h>
#include <stdlib.h>
#include <string.h>

#define SUBJECT_COUNT 3
#define DAYS_IN_WEEK 7

/* Structure Definition as mandated by assessment specification */
struct StudyLog {
    char subject[40];
    float hours[DAYS_IN_WEEK];
};

/* Function Prototypes */
void displayMenu(void);
void logStudyHours(struct StudyLog logs[], int numSubjects);
void calculateAndDisplayReport(const struct StudyLog logs[], int numSubjects);
void displayProgressChart(const struct StudyLog logs[], int numSubjects);
int saveAndExit(const struct StudyLog logs[], int numSubjects, const char *filename);

int main(void) {
    int choice;
    int i, j;

    /* Initialize array of at least 3 subject records */
    struct StudyLog subjects[SUBJECT_COUNT] = {
        {"C Programming",    {0.0f, 0.0f, 0.0f, 0.0f, 0.0f, 0.0f, 0.0f}},
        {"Web Development",  {0.0f, 0.0f, 0.0f, 0.0f, 0.0f, 0.0f, 0.0f}},
        {"Database Systems", {0.0f, 0.0f, 0.0f, 0.0f, 0.0f, 0.0f, 0.0f}}
    };

    printf("=====================================================================\n");
    printf("              STUDENT PRODUCTIVITY TRACKER (CAPSTONE)                \n");
    printf("=====================================================================\n");

    while (1) {
        displayMenu();
        printf("Enter your choice (1-3): ");

        if (scanf("%d", &choice) != 1) {
            printf("\n[ERROR]: Invalid input! Please enter a numerical option (1-3).\n");
            while (getchar() != '\n'); /* Flush input */
            continue;
        }
        while (getchar() != '\n'); /* Flush trailing newline */

        switch (choice) {
            case 1:
                logStudyHours(subjects, SUBJECT_COUNT);
                break;

            case 2:
                calculateAndDisplayReport(subjects, SUBJECT_COUNT);
                displayProgressChart(subjects, SUBJECT_COUNT);
                break;

            case 3:
                if (saveAndExit(subjects, SUBJECT_COUNT, "productivity_log.txt") == 0) {
                    printf("\nSession completed successfully. Have a productive day!\n");
                    return 0;
                } else {
                    printf("\n[WARNING]: Error occurred during file save.\n");
                    return 1;
                }

            default:
                printf("\n[!] Invalid choice! Please select an option between 1 and 3.\n");
                break;
        }
    }

    return 0;
}

/* Function: Display Main Menu */
void displayMenu(void) {
    printf("\n----------------------- MAIN MENU -----------------------\n");
    printf("  1. Log Today's Study Hours\n");
    printf("  2. View Weekly Report & Progress Chart\n");
    printf("  3. Save & Exit\n");
    printf("---------------------------------------------------------\n");
}

/* Function: Log Daily Study Hours */
void logStudyHours(struct StudyLog logs[], int numSubjects) {
    int day, s;
    float hrs;

    printf("\n--- LOG STUDY HOURS ---\n");
    printf("Select Day of the Week (1 = Monday ... 7 = Sunday): ");
    while (1) {
        if (scanf("%d", &day) != 1 || day < 1 || day > 7) {
            printf("  [!] Please enter a valid day between 1 and 7: ");
            while (getchar() != '\n');
            continue;
        }
        while (getchar() != '\n');
        break;
    }

    printf("\nLogging study hours for Day %d:\n", day);
    for (s = 0; s < numSubjects; s++) {
        while (1) {
            printf("  Enter hours for [%s] (0.0 to 24.0): ", logs[s].subject);
            if (scanf("%f", &hrs) != 1) {
                printf("    [!] Invalid input format. Numerical value required.\n");
                while (getchar() != '\n');
                continue;
            }
            while (getchar() != '\n');

            if (hrs < 0.0f || hrs > 24.0f) {
                printf("    [!] Hours must be between 0.0 and 24.0.\n");
            } else {
                logs[s].hours[day - 1] = hrs;
                break;
            }
        }
    }

    printf("[SUCCESS]: Study hours for Day %d updated successfully!\n", day);
}

/* Function: Calculate and display weekly total and daily average for each subject */
void calculateAndDisplayReport(const struct StudyLog logs[], int numSubjects) {
    int s, d;
    float weeklyTotal;
    float dailyAverage;
    float grandTotal = 0.0f;

    printf("\n=====================================================================\n");
    printf("                      WEEKLY PRODUCTIVITY REPORT                     \n");
    printf("=====================================================================\n");
    printf("%-20s | %-12s | %-14s | %-14s\n", "SUBJECT", "TOTAL HOURS", "DAILY AVG (7d)", "STATUS");
    printf("---------------------+--------------+----------------+---------------\n");

    for (s = 0; s < numSubjects; s++) {
        weeklyTotal = 0.0f;
        for (d = 0; d < DAYS_IN_WEEK; d++) {
            weeklyTotal += logs[s].hours[d];
        }
        dailyAverage = weeklyTotal / (float)DAYS_IN_WEEK;
        grandTotal += weeklyTotal;

        printf("%-20s | %9.2f hrs | %9.2f hrs/d | %s\n",
               logs[s].subject,
               weeklyTotal,
               dailyAverage,
               (dailyAverage >= 2.0f) ? "On Track" : "Needs Focus");
    }

    printf("---------------------+--------------+----------------+---------------\n");
    printf("GRAND TOTAL STUDY TIME: %.2f hours across all subjects\n", grandTotal);
    printf("=====================================================================\n");
}

/* Function: Display simple text-based progress chart (one filled dot per hour) */
void displayProgressChart(const struct StudyLog logs[], int numSubjects) {
    int s, d, dots, k;
    const char *dayNames[DAYS_IN_WEEK] = {"Day 1 (Mon)", "Day 2 (Tue)", "Day 3 (Wed)",
                                          "Day 4 (Thu)", "Day 5 (Fri)", "Day 6 (Sat)", "Day 7 (Sun)"};

    printf("\n=====================================================================\n");
    printf("            TEXT-BASED STUDY PROGRESS CHART (* = 1 Hour)             \n");
    printf("=====================================================================\n");

    for (s = 0; s < numSubjects; s++) {
        printf("\n[%s]\n", logs[s].subject);
        for (d = 0; d < DAYS_IN_WEEK; d++) {
            dots = (int)(logs[s].hours[d]); /* Truncate to nearest integer */
            printf("  %-12s [%4.1f h] : ", dayNames[d], logs[s].hours[d]);
            if (dots == 0) {
                printf("-");
            } else {
                for (k = 0; k < dots; k++) {
                    /* Print dot symbol */
                    printf("*");
                }
            }
            printf("\n");
        }
    }
    printf("=====================================================================\n");
}

/* Function: Save all records to productivity_log.txt and exit */
int saveAndExit(const struct StudyLog logs[], int numSubjects, const char *filename) {
    FILE *file = NULL;
    int s, d;

    printf("\nSaving productivity data to '%s'...\n", filename);
    file = fopen(filename, "w");
    if (file == NULL) {
        printf("[ERROR]: Failed to open file '%s' for writing!\n", filename);
        return -1;
    }

    /*
     * Comma-separated format per line:
     * Subject,Day1,Day2,Day3,Day4,Day5,Day6,Day7
     */
    for (s = 0; s < numSubjects; s++) {
        fprintf(file, "%s", logs[s].subject);
        for (d = 0; d < DAYS_IN_WEEK; d++) {
            fprintf(file, ",%.2f", logs[s].hours[d]);
        }
        fprintf(file, "\n");
    }

    fclose(file);
    printf("[SUCCESS]: %d subject records saved successfully to '%s'.\n", numSubjects, filename);
    return 0;
}
