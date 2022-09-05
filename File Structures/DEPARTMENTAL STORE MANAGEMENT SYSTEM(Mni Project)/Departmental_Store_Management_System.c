#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <windows.h>

#define CLEAR "cls"
#define MAX 20

typedef struct items
{
    char itemCode[MAX];
    char itemName[MAX];
    int quantity;
    float rate;
    char description[MAX];
}Item;

Item item;


void options();
int isCodeAvailable();
void calculateBill();
void addProd();
void deleteProd();
void editProd();
void display();

int main()
{
    options();
    system(CLEAR);
    return 0;
}


void options()
{
    int choice;

    do
    {
        printf("\n\n\n\n\n\t\t\t\t\t*** WELCOME TO ALL-IN ONE DEPARTMENTAL STORE ***");
        printf("\n\t\t\t\t\t-------------------------------------------------");
        printf("\n\t\t\t\t\t\t\t1. CALCULATE BILL");
        printf("\n\t\t\t\t\t\t\t2. ADD A PRODUCT");
        printf("\n\t\t\t\t\t\t\t3. DELETE A PRODUCT");
        printf("\n\t\t\t\t\t\t\t4. EDIT A PRODUCT");
        printf("\n\t\t\t\t\t\t\t5. DISPLAY STORE");
        printf("\n\t\t\t\t\t\t\t6. EXIT STORE");
        printf("\n\t\t\t\t\t-------------------------------------------------\n");
        printf("\t\t\t\t\tEnter your choice: ");
        scanf("%d", &choice);

        switch(choice)
        {
        case 1:
            system(CLEAR);
            calculateBill();
            break;
        case 2:
            system(CLEAR);
            addProd();
            break;
        case 3:
            system(CLEAR);
            deleteProd();
            break;
        case 4:
            system(CLEAR);
            editProd();
            break;
        case 5:
            system(CLEAR);
            display();
            break;
        case 6:
            system(CLEAR);
            printf("\n\n\n\n\n\n\n\n\n\n");
            printf("\n\n\n\t\t\t\t\tThanks! for Shopping with us\n");
            printf("\t\t\t\t      ================================\n");
            printf("\t\t\t\t\tHope to see you soon again\n\n\n");
            exit(0);
            break;
        default:
            printf("\n\t\t\t\t\tInvalid! entry. Make a choice between 1 & 6\n\n\n");
            break;
        }
    } while (choice != 6);
}

int isCodeAvailable(char code[])
{
    FILE *file;
    file = fopen("Record.txt", "r");
    if(file == NULL)
    {
        printf("\n\n\t\t\t\tError occurred while opening the file!\n");
        exit(1);
    }

    while (fread(&item, sizeof(item), 1, file))
    {
        if(strcmp(code, item.itemCode) == 0)
        {
            fclose(file);
            return 1;
        }
    }
    fclose(file);
    return 0;
}

void addProd()
{
    char code[MAX];
    FILE *file;
    file = fopen("Record.txt", "a");
    if(file == NULL)
    {
        printf("\n\n\t\t\t\tError occurred while opening the file!\n");
        exit(1);
    }

    display();
    jump:
    printf("\t\t\t\t\t    *****ADDING A PRODUCT*****\n\n");
    printf("\t\t\t\t   Enter \"end\" if you want to go back to main menu\n\n");
    printf("\t\t\t\t\t\tProduct Code:");
    scanf("%s", code);

    if (strcmp(code, "end") == 0)
    {
        system(CLEAR);
        options();
    }

    if(isCodeAvailable(code) == 1)
    {
        printf("\n\n\t\t\t\t\tProduct already exists!\n\n\n");
        goto jump;
    }

    strcpy(item.itemCode, code);

    printf("\t\t\t\t\t\tProduct Name:");
    scanf("%s", item.itemName);

    printf("\t\t\t\t\t\tProduct Rate:");
    scanf("%f", &item.rate);

    printf("\t\t\t\t\t\tProduct Quantity:");
    scanf("%d", &item.quantity);

    printf("\t\t\t\t\t\tDescription:");
    scanf("%s", item.description);

    if(fwrite(&item, sizeof(item), 1, file))
    {
        printf("\n\t\t\t\t\t  Data has been stored successfully!\n\n\n");
    }
    fclose(file);
}

void deleteProd()
{
    FILE *file1, *file2;
    char code[MAX];

    file1 = fopen("Record.txt", "r");
    file2 = fopen("temp.txt", "w");
    if(file1 == NULL)
    {
        printf("\n\n\t\t\t\tError occurred while opening the file 1!\n");
        exit(1);
    }

    if(file2 == NULL)
    {
        printf("\n\n\t\t\t\tError occurred while opening the file 2!\n");
        fclose(file1);
        exit(1);
    }

    display();
    jump:
    printf("\t\t\t\t\t    *****DELETING A PRODUCT*****\n\n");
    printf("\t\t\t\t   Enter \"end\" if you want to go back to main menu\n\n");
    printf("\t\t\t\t   Enter the code of the product you want to delete: ");
    scanf("%s", code);

    if (strcmp(code, "end") == 0)
    {
        system(CLEAR);
        options();
    }

    if(isCodeAvailable(code) == 0)
    {
        printf("\n\n\t\t\t\t\t\tProduct doesn't exist!\n\n\n");

        goto jump;
    }

    while (fread(&item, sizeof(item), 1, file1))
    {
        if (strcmp(code, item.itemCode) != 0)
        {
            fwrite(&item, sizeof(item), 1, file2);
        }
    }
    fclose(file1);
    fclose(file2);

    file1 = fopen("Record.txt", "w");
    file2 = fopen("temp.txt", "r");

    if(file1 == NULL)
    {
        printf("\n\n\t\t\t\tError occurred while opening the file 1!\n");
        exit(1);
    }

    if(file2 == NULL)
    {
        printf("\n\n\t\t\t\tError occurred while opening the file 2!\n");
        fclose(file1);
        exit(1);
    }

    while (fread(&item, sizeof(item), 1, file2))
    {
        fwrite(&item, sizeof(item), 1, file1);
    }

    printf("\n\v\t\t\t\t\t   Product deleted sucessfully!\n\n\n\n");

    fclose(file1);
    fclose(file2);
}

void editProd()
{
    char code[MAX];
    FILE *file1, *file2;

    display();
    jump:
    printf("\t\t\t\t\t    *****UPDATING A PRODUCT*****\n\n");
    printf("\t\t\t\t   Enter \"end\" if you want to go back to main menu\n\n");
    printf("\t\t\t\t   Enter the code of the product you want to edit: ");
    scanf("%s", code);

    if (strcmp(code, "end") == 0)
    {
        system(CLEAR);
        options();
    }

    if(isCodeAvailable(code) == 0)
    {
        printf("\n\n\t\t\t\t\t\tProduct doesn't exist!\n\n\n");

        goto jump;
    }

    file1 = fopen("Record.txt", "r");
    file2 = fopen("temp.txt", "w");
    if(file1 == NULL)
    {
        printf("\n\n\t\t\t\tError occurred while opening the file 1!\n");
        exit(1);
    }

    if(file2 == NULL)
    {
        printf("\n\n\t\t\t\tError occurred while opening the file 2!\n");
        fclose(file1);
        exit(1);
    }

    while(fread(&item, sizeof(item), 1, file1))
    {

        if(strcmp(code, item.itemCode) != 0)
        {
            fwrite(&item, sizeof(item), 1, file2);
        }
        else
        {
            printf("\t\t\t\t\t\tProduct Name:");
            scanf("%s", item.itemName);

            printf("\t\t\t\t\t\tProduct Rate:");
            scanf("%f", &item.rate);

            printf("\t\t\t\t\t\tProduct Quantity:");
            scanf("%d", &item.quantity);

            printf("\t\t\t\t\t\tDescription:");
            scanf("%s", item.description);

            fwrite(&item, sizeof(item), 1, file2);
        }
    }
    fclose(file1);
    fclose(file2);

    file1 = fopen("Record.txt", "w");
    file2 = fopen("temp.txt", "r");
    if(file1 == NULL)
    {
        printf("\n\n\t\t\t\tError occurred while opening the file 1!\n");
        exit(1);
    }

    if(file2 == NULL)
    {
        printf("\n\n\t\t\t\tError occurred while opening the file 2!\n");
        fclose(file1);
        exit(1);
    }

    while(fread(&item, sizeof(item), 1, file2))
    {
        fwrite(&item, sizeof(item), 1, file1);
    }

    printf("\n\n\t\t\t\t\tData has been updated successfully\n\n\n");

    fclose(file1);
    fclose(file2);
}

void display()
{
    int count = 0;
    FILE *file;
    file = fopen("Record.txt", "r");
    if(file == NULL)
    {
        printf("\n\n\t\t\t\tError occurred while opening the file!\n");
        exit(1);
    }

    printf("\t\t\t\t\t\t    AVAILABLE PRODUCTS\n");
    printf("\t\t\t\t\t\t***************************\n");
    printf("\t\t\t-------------------------------------------------------------------------\n");
    printf("\t\t\t CODE\t||    NAME\t||     RATE\t||   QUANTITY   ||  DESCRIPTION \n");
    printf("\t\t\t-------------------------------------------------------------------------\n");

    while (fread(&item, sizeof(item), 1, file))
    {
        printf("\t\t\t  %s\t||   %s\t||     %.2f\t||     %d\t||  %s\t\n", item.itemCode, item.itemName, item.rate, item.quantity, item.description);
        count++;
    }
    printf("\t\t\t-------------------------------------------------------------------------\n\n\n");

    if (count == 0)
    {
        system(CLEAR);
        printf("\n\t\t\t\t\t   *No products available in store\n\n\n");

    }
    fclose(file);
}

void calculateBill()
{
    FILE *file1, *file2;
    COORD c;
    char code[MAX];
    int quantity = 0, itemCounter = 1, coordY = 16;
    float total = 0, totalBill = 0;

    c.X = 4;
    c.Y = 13;
    SetConsoleCursorPosition(GetStdHandle(STD_OUTPUT_HANDLE), c);
    printf("\t\t\t--------------------------------------------------------------------------------------");

    c.X = 4;
    c.Y = 14;
    SetConsoleCursorPosition(GetStdHandle(STD_OUTPUT_HANDLE), c);
    printf("\t\t\t S.N\t||    CODE\t||    NAME\t||     RATE\t||   QUANTITY   ||  TOTAL ");

    c.X = 4;
    c.Y = 15;
    SetConsoleCursorPosition(GetStdHandle(STD_OUTPUT_HANDLE), c);
    printf("\t\t\t--------------------------------------------------------------------------------------");


    while(1)
    {
        c.X = 50;
        c.Y = 7;
        SetConsoleCursorPosition(GetStdHandle(STD_OUTPUT_HANDLE), c);
        printf("Enter \"end\" if you want to exit.");

        c.X = 50;
        c.Y = 8;
        SetConsoleCursorPosition(GetStdHandle(STD_OUTPUT_HANDLE), c);
        printf("Enter product code:");
        scanf("%s", code);

        if (strcmp(code, "end") == 0)
        {
            c.X = 50;
            c.Y = coordY + 3;
            SetConsoleCursorPosition(GetStdHandle(STD_OUTPUT_HANDLE), c);
            printf("Total bill: Rs. %.2f", totalBill);
            break;
        }

        c.X = 50;
        c.Y = 9;
        SetConsoleCursorPosition(GetStdHandle(STD_OUTPUT_HANDLE), c);
        printf("Enter Quantity:");
        scanf("%d", &quantity);

        file1 = fopen("Record.txt", "r");
        file2 = fopen("Update.txt", "w");
        while(fread(&item, sizeof(item), 1, file1))
        {
            if((strcmp (code, item.itemCode)) == 0)
            {
                total = quantity * item.rate;           
                totalBill += total;                     
                item.quantity -= quantity;              

                c.X = 4;
                c.Y = coordY;
                SetConsoleCursorPosition(GetStdHandle(STD_OUTPUT_HANDLE), c);
                printf("\t\t\t   %d\t||     %s\t||   %s\t||     %.2f\t||      %d\t||   %.2f\n", itemCounter, item.itemCode, item.itemName, item.rate, quantity, total);
                coordY++;                               
                itemCounter++;                          
                fwrite(&item, sizeof(item), 1, file2);  
            }
            else
            {
                fwrite(&item, sizeof(item), 1, file2);
            }
        }
        fclose(file1);
        fclose(file2);

        file1 = fopen("Record.txt", "w");
        file2 = fopen("Update.txt", "r");
        while(fread(&item, sizeof(item), 1, file2))
        {
            fwrite(&item, sizeof(item), 1, file1);
        }
        fclose(file1);
        fclose(file2);
    }
}
