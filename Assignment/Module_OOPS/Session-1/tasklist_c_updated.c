#include <stdio.h>
#include <string.h>

char tasks[5][100];
int taskDone[5] = {0};
int taskCount = 0;

void markTaskDone(int index) {
    if (index >= 0 && index < taskCount) {
        taskDone[index] = 1;
    }
}

int main() {
    int i, index;

    for (i = 0; i < 5; i++) {
        printf("Enter task %d: ", i + 1);
        fgets(tasks[i], 100, stdin);
        tasks[i][strcspn(tasks[i], "\n")] = '\0';
        taskCount++;
    }

    printf("\nEnter task number to mark as DONE: ");
    scanf("%d", &index);

    markTaskDone(index - 1);

    printf("\nUpdated Task List:\n");

    for (i = 0; i < taskCount; i++) {
        if (taskDone[i])
            printf("%d. %s - DONE\n", i + 1, tasks[i]);
        else
            printf("%d. %s - PENDING\n", i + 1, tasks[i]);
    }

    return 0;
}
