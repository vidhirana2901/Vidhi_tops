/*
 * Assessment M3-A1: Software Engineering (Intro to Programming)
 * Section D — AI-Augmented Learning
 * Step 2: Human-Corrected & Hardened Code (Without AI)
 *
 * Candidate: Vidhi Rana
 *
 * Enhancements & Bug Fixes over AI version:
 * 1. Fixed floating-point precision failure: Replaced direct float comparison with an
 *    epsilon tolerance threshold (fabsf(diff_min - diff_max) < EPSILON) to correctly
 *    detect when the mean is mathematically midway.
 * 2. Handled boundary case (a) where all 10 values are identical (min == max == mean).
 * 3. Enforced absolute distance using fabsf() for accurate distance calculations on
 *    mixed negative and positive numbers (boundary case b).
 * 4. Added robust input validation to guard against non-integer inputs.
 * 5. Optimized sorting with an early-exit swap flag.
 */

#include <stdio.h>
#include <stdlib.h>
#include <math.h>

#define SIZE 10
#define EPSILON 0.00001f

int main(void) {
    int arr[SIZE];
    long long sum = 0; /* Guard against integer overflow */
    int min, max;
    float mean;
    float diff_min, diff_max;
    int i, j, temp, swapped;

    printf("========================================================\n");
    printf("     AI-AUGMENTED LEARNING: 10-INTEGER DATA ANALYSER    \n");
    printf("========================================================\n\n");
    printf("Please enter exactly 10 integers (positive, negative, or zero):\n");

    /* Step 1: Input ingestion with robust validation */
    for (i = 0; i < SIZE; i++) {
        while (1) {
            printf("  Enter integer %2d: ", i + 1);
            if (scanf("%d", &arr[i]) != 1) {
                printf("    [!] Invalid input! Please enter a valid integer.\n");
                while (getchar() != '\n'); /* Flush invalid character */
                continue;
            }
            while (getchar() != '\n'); /* Flush newline */
            break;
        }
        sum += arr[i];
    }

    /* Step 2: Determine Min and Max */
    min = arr[0];
    max = arr[0];
    for (i = 1; i < SIZE; i++) {
        if (arr[i] < min) {
            min = arr[i];
        }
        if (arr[i] > max) {
            max = arr[i];
        }
    }

    /* Compute arithmetic mean accurately using float cast */
    mean = (float)sum / (float)SIZE;

    /* Step 3: Optimized Bubble Sort (Ascending) */
    for (i = 0; i < SIZE - 1; i++) {
        swapped = 0;
        for (j = 0; j < SIZE - i - 1; j++) {
            if (arr[j] > arr[j + 1]) {
                temp = arr[j];
                arr[j] = arr[j + 1];
                arr[j + 1] = temp;
                swapped = 1;
            }
        }
        if (!swapped) break; /* Already sorted */
    }

    /* Step 4: Display Statistical Results */
    printf("\n========================================================\n");
    printf("                   STATISTICAL SUMMARY                  \n");
    printf("========================================================\n");
    printf("Minimum Value       : %d\n", min);
    printf("Maximum Value       : %d\n", max);
    printf("Sum of Elements     : %lld\n", sum);
    printf("Arithmetic Mean     : %.2f\n", mean);
    printf("--------------------------------------------------------\n");

    printf("Sorted Array (Asc)  : ");
    for (i = 0; i < SIZE; i++) {
        printf("%d%s", arr[i], (i == SIZE - 1) ? "" : ", ");
    }
    printf("\n--------------------------------------------------------\n");

    /*
     * Step 5: Mean Proximity Evaluation (Fixed with Epsilon & Boundary Handling)
     */
    printf("Mean Proximity Check: ");

    /* Boundary Case (a): All elements identical */
    if (min == max) {
        printf("All 10 values are identical (%d). The mean, min, and max coincide.\n", min);
    } else {
        /* Calculate absolute Euclidean distances */
        diff_min = fabsf(mean - (float)min);
        diff_max = fabsf((float)max - mean);

        /* Boundary Case (c): Check for exact midway with floating-point tolerance */
        if (fabsf(diff_min - diff_max) < EPSILON) {
            printf("The mean (%.2f) is EXACTLY MIDWAY between min (%d) and max (%d).\n",
                   mean, min, max);
            printf("                      (Distance to min = %.2f, Distance to max = %.2f)\n",
                   diff_min, diff_max);
        } else if (diff_min < diff_max) {
            printf("The mean (%.2f) is CLOSER TO THE MINIMUM (%d).\n", mean, min);
            printf("                      (Distance to min: %.2f vs Distance to max: %.2f)\n",
                   diff_min, diff_max);
        } else {
            printf("The mean (%.2f) is CLOSER TO THE MAXIMUM (%d).\n", mean, max);
            printf("                      (Distance to max: %.2f vs Distance to min: %.2f)\n",
                   diff_max, diff_min);
        }
    }

    printf("========================================================\n");
    return 0;
}
