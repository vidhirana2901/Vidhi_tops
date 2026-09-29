/*
 * Assessment M3-A1: Software Engineering (Intro to Programming)
 * Section B — Practical Coding Tasks
 * Task 3: Student Record Manager
 *
 * Description: Uses structures and functions in C to store student records,
 * assigns letter grades via pointer, prints a formatted table with column
 * headers, and determines the top performing student using a separate function.
 */

#include <stdio.h>
#include <string.h>

#define STUDENT_COUNT 3

/* Definition of struct Student */
struct Student {
    char name[50];
    int rollno;
    float marks;
    char grade;
};

/* Function to assign letter grade based on marks value using Task 1 bands */
void assignGrade(struct Student *s) {
    if (s == NULL) return;

    if (s->marks >= 90.0f) {
        s->grade = 'A';
    } else if (s->marks >= 75.0f) {
        s->grade = 'B';
    } else if (s->marks >= 60.0f) {
        s->grade = 'C';
    } else if (s->marks >= 45.0f) {
        s->grade = 'D';
    } else {
        s->grade = 'F';
    }
}

/* Function to identify and display the top-performing student */
void printTopper(struct Student students[], int n) {
    int i;
    int topperIndex = 0;
    float highestMarks = -1.0f;

    for (i = 0; i < n; i++) {
        if (students[i].marks > highestMarks) {
            highestMarks = students[i].marks;
            topperIndex = i;
        }
    }

    printf("\n===============================================================\n");
    printf("                     TOP PERFORMER SUMMARY                     \n");
    printf("===============================================================\n");
    printf("Congratulations to %s (Roll No: %d)!\n", students[topperIndex].name, students[topperIndex].rollno);
    printf("Highest Score : %.2f / 100\n", students[topperIndex].marks);
    printf("Grade Achieved: %c\n", students[topperIndex].grade);
    printf("===============================================================\n");
}

int main(void) {
    struct Student students[STUDENT_COUNT];
    int i;

    printf("===============================================================\n");
    printf("                   STUDENT RECORD MANAGER                      \n");
    printf("===============================================================\n\n");
    printf("Please enter details for %d students:\n\n", STUDENT_COUNT);

    for (i = 0; i < STUDENT_COUNT; i++) {
        printf("--- Enter Details for Student %d ---\n", i + 1);

        printf("Roll Number: ");
        scanf("%d", &students[i].rollno);
        while (getchar() != '\n'); /* Flush newline */

        printf("Student Name: ");
        if (fgets(students[i].name, sizeof(students[i].name), stdin) != NULL) {
            /* Strip trailing newline */
            size_t len = strlen(students[i].name);
            if (len > 0 && students[i].name[len - 1] == '\n') {
                students[i].name[len - 1] = '\0';
            }
        }

        printf("Marks (0 - 100): ");
        scanf("%f", &students[i].marks);
        while (getchar() != '\n'); /* Flush newline */

        /* Validate marks bounds */
        if (students[i].marks < 0.0f) students[i].marks = 0.0f;
        if (students[i].marks > 100.0f) students[i].marks = 100.0f;

        /* Call assignGrade passing pointer to current student */
        assignGrade(&students[i]);
        printf("\n");
    }

    /* Display Formatted Table */
    printf("\n===============================================================\n");
    printf("                     STUDENT RECORDS TABLE                     \n");
    printf("===============================================================\n");
    printf("%-10s | %-25s | %-10s | %-6s\n", "ROLL NO", "STUDENT NAME", "MARKS", "GRADE");
    printf("-----------+---------------------------+------------+--------\n");

    for (i = 0; i < STUDENT_COUNT; i++) {
        printf("%-10d | %-25s | %-10.2f | %-6c\n",
               students[i].rollno,
               students[i].name,
               students[i].marks,
               students[i].grade);
    }
    printf("===============================================================\n");

    /* Identify and display topper */
    printTopper(students, STUDENT_COUNT);

    return 0;
}
