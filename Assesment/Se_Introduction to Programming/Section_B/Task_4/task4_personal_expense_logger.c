/*
 * Assessment M3-A1: Software Engineering (Intro to Programming)
 * Section B — Practical Coding Tasks
 * Task 4: Personal Expense Logger
 *
 * Description: Menu-driven C program to log and view personal daily expenses,
 * calculate a running total, and export records to expenses.txt upon exit.
 */

#include <stdio.h>
#include <stdlib.h>
#include <string.h>

#define MAX_EXPENSES 10

/* Structure definition */
struct Expense {
    char category[30];
    float amount;
};

int main(void) {
    struct Expense expenses[MAX_EXPENSES];
    int count = 0;
    int choice;
    int i;
    float running_total;
    FILE *filePtr = NULL;

    printf("==============================================\n");
    printf("           PERSONAL EXPENSE LOGGER            \n");
    printf("==============================================\n");

    while (1) {
        printf("\n------------------- MENU -------------------\n");
        printf("1. Add Expense\n");
        printf("2. View All Expenses\n");
        printf("3. Save & Exit\n");
        printf("--------------------------------------------\n");
        printf("Enter your choice (1-3): ");

        if (scanf("%d", &choice) != 1) {
            printf("[!] Invalid input! Please enter a number between 1 and 3.\n");
            while (getchar() != '\n'); /* Flush buffer */
            continue;
        }
        while (getchar() != '\n'); /* Flush trailing newline */

        switch (choice) {
            case 1:
                /* Option 1: Add Expense */
                if (count >= MAX_EXPENSES) {
                    printf("\n[WARNING]: Expense list is full! (Max %d entries reached).\n", MAX_EXPENSES);
                    printf("Please view your expenses or save and exit.\n");
                    break;
                }

                printf("\n--- Add New Expense (#%d) ---\n", count + 1);
                printf("Enter Expense Category (e.g., Food, Travel, Books): ");
                if (fgets(expenses[count].category, sizeof(expenses[count].category), stdin) != NULL) {
                    size_t len = strlen(expenses[count].category);
                    if (len > 0 && expenses[count].category[len - 1] == '\n') {
                        expenses[count].category[len - 1] = '\0';
                    }
                }

                printf("Enter Amount (INR): ");
                while (1) {
                    if (scanf("%f", &expenses[count].amount) != 1) {
                        printf("  [!] Invalid number format. Re-enter amount: ");
                        while (getchar() != '\n');
                        continue;
                    }
                    while (getchar() != '\n');

                    if (expenses[count].amount < 0.0f) {
                        printf("  [!] Amount cannot be negative. Re-enter amount: ");
                    } else {
                        break;
                    }
                }

                printf("[SUCCESS]: Logged '%s' of amount Rs. %.2f successfully!\n",
                       expenses[count].category, expenses[count].amount);
                count++;
                break;

            case 2:
                /* Option 2: View All Expenses */
                printf("\n==============================================\n");
                printf("             LOGGED EXPENSES LIST             \n");
                printf("==============================================\n");

                if (count == 0) {
                    printf("No expense records logged yet.\n");
                } else {
                    running_total = 0.0f;
                    printf("%-6s | %-24s | %-12s\n", "NO.", "CATEGORY", "AMOUNT (Rs.)");
                    printf("-------+--------------------------+-------------\n");

                    for (i = 0; i < count; i++) {
                        printf("%-6d | %-24s | %10.2f\n", i + 1, expenses[i].category, expenses[i].amount);
                        running_total += expenses[i].amount;
                    }

                    printf("-------+--------------------------+-------------\n");
                    printf("%-33s | %10.2f\n", "TOTAL RUNNING EXPENSES", running_total);
                }
                printf("==============================================\n");
                break;

            case 3:
                /* Option 3: Save & Exit */
                printf("\nSaving expense records to 'expenses.txt'...\n");

                filePtr = fopen("expenses.txt", "w");
                if (filePtr == NULL) {
                    printf("[ERROR]: Failed to open expenses.txt for writing!\n");
                    return 1;
                }

                for (i = 0; i < count; i++) {
                    fprintf(filePtr, "%s,%.2f\n", expenses[i].category, expenses[i].amount);
                }
                fclose(filePtr);

                printf("[SUCCESS]: %d record(s) written to 'expenses.txt' successfully.\n", count);
                printf("Exiting Personal Expense Logger. Goodbye!\n");
                return 0;

            default:
                printf("\n[!] Invalid choice! Please select 1, 2, or 3.\n");
                break;
        }
    }

    return 0;
}
