// Coded by: Enoch Clements
// Date: 6/19/2019
// Purpose: Demonstrate Programming Knowledge
//+++++++++++++++++++++++++++++++++++++++++++

#include <fstream>
#include <iostream>
#include <vector>
#include <string>
#include <exception>
#include <algorithm>

using namespace std;

// declarations for functions
void popVector(vector<string>&, vector<string>&);
void partOne(vector<string>, vector<string>);
void partTwo(vector<string>, vector<string>);
void runMenu();

const int LEN = 20;
int max_cycles = 20000;
vector<string> frequencies;
vector<string> operand;

// short and simple main if I do say so myself
int main()
{
	runMenu();

}

// function to run the menu
void runMenu()
{
	// clears all previous text
	system("CLS");
	// int to hold the users response
	int response;
	int changeMC;

	frequencies.clear();
	operand.clear();

	// creating some form of menu and reads a response
	cout << "WELCOME TO THE FANTASTIC AND AMAZING TIME TRAVELING FREQUENCY REGULATOR :) \n \n \n" << endl;
	cout << "*NOTICE: IF YOU WANT TO ADD ANY OR CHANGE THE FREQUENCIES PLEASE DO SO NOW IN THE FILE CALLED (frequencies.txt) \n" << endl;
	cout << "\n1: executes part 1 of the challenge \n2: executes part 2 of the challenge \n3: Please select this option if you would like to change the max number of cycles" << endl;	
	cout << "     the current max cycles is: " << max_cycles << "\n" << endl;

	// test if it is even something that can be read and if not resets the menu
	if (cin >> response)
	{
		// I used a switch instead of multiple if statements so that it would be easier to add to the menu if nessicary in the future
		switch (response)
		{
		case 1:
			popVector(frequencies, operand);
			partOne(frequencies, operand);

		case 2:
			popVector(frequencies, operand);
			partTwo(frequencies, operand);

		case 3:
			cout << "\nPlease enter a new max cycles: ";
			if (cin >> changeMC)
			{
				max_cycles = changeMC;
				cout << "\nNice :) the new max cycles is: " << max_cycles << "\n" << endl;
				system("PAUSE");
				cin.clear();
				cin.ignore(80, '\n');
				runMenu();
			}
			else
			{
				cout << "\nPlease enter in a valid input... \n";
				system("PAUSE");
				cin.clear();
				cin.ignore(80, '\n');
				runMenu();
			}
		default:
			cout << "\nPlease enter one of the options... \n" << endl; system("PAUSE"); runMenu();
		}
	}
	else 
	{
		cout << "\nPlease enter in a valid input... \n";
		system("PAUSE");
		cin.clear();
		cin.ignore(80, '\n');
		runMenu();
	}

	// tests response for errors
	popVector(frequencies, operand);
	

	system("PAUSE");	
}

// function that performs the problem posed in part one of the test
void partOne(vector<string> freq, vector<string> oper)
{
	// variable for adding the frequency changes
	int current = 0;
	// for loop that loops until the end of the changes to the frequency
	for (int i = 0; i < freq.size(); i++)
	{
		if (oper[i] == "+")
		{
			current += stoi(freq[i]);

		}
		else if (oper[i] == "-")
		{
			current -= stoi(freq[i]);
		}
	}
	cout << "\nThe frequency after all the changes have been applied is " << current << "\n\n"<< endl;
	system("PAUSE");
	freq.clear();
	oper.clear();
	runMenu();
}


void partTwo(vector<string> freq, vector<string> oper)
{
	int temp;
	int cycles = 0;
	int tempcyc = 0;
	int limit = freq.size();
	// holds the frequencies
	vector<int> results;
	// holds the index where it finds a repeating frequency
	vector<int> index;
	int current = 0;
	results.push_back(current);
	while (index.size() == 0)
	{
		// breaks the loop if you pass the limit on cycles
		if (cycles > max_cycles) break;

		if (oper[tempcyc] == "+")
		{
			current += stoi(freq[tempcyc]);
			results.push_back(current);
			for (int b = cycles; b >= 0; b--)
			{
				if (results[cycles] == results[b] && cycles != b)
					index.push_back(cycles);
			}
		}
		else if (oper[tempcyc] == "-")
		{
			current -= stoi(freq[tempcyc]);
			results.push_back(current);
			for (int b = cycles; b >= 0; b--)
			{
				if (results[cycles] == results[b] && cycles != b)
					index.push_back(cycles);
			}
		}
		// checks if we are at the end of the available frequency changes
		if (tempcyc == (limit - 1))
			tempcyc = 0;
		// increments both integers acting as indexes one persistent and one that ironically cycles
		tempcyc++;
		cycles++;

	}
	
	// checks if there even is any repeating frequencies
	if (index.size() == 0)
	{
		// outputs a message informing that there are no repeating frequencies
		cout << "I'm sorry, there are no repeating frequencies withing the current max cycles :(\n\n" << endl;
	}
	else
	{
		// sorts the vector so that the first result that appears twice would show up in the first slot
		// this also alows for future use of frequency results
		sort(index.begin(), index.end());
		temp = index[0];
		cout << "\nThe frequncy that you reach first twice is " << results[temp] << "\nat cycle: "<< cycles << "\n" << endl;
	}
	system("PAUSE");
	// since the vectors are passed in by reference this should clear out the results allowing the menu to have the option to change the frequency differenciates
	freq.clear();
	oper.clear();
	runMenu();
}

// function to populate two vectors based on data read in from a stream
// passes in two vectors by reference
void popVector(vector<string> &freq, vector<string> &oper)
{
	int i = 0;
	char temp[LEN];
	char timespace;
	// creates a stream and opens the file that has the frequencies in it
	ifstream fileIn;
	fileIn.open("frequencies.txt");
	if (!fileIn)
	{
		cout << "Error opening input file" << endl;
		system("PAUSE");
	}

	// reads in the contents of the file containing the frequencies
	string stuffs;
	fileIn >> stuffs;

	fileIn.close();

	// takes the data read in and converts it to a c string
	const char* h = stuffs.c_str();

	// creates a loop to analyze all the data that was read in
	char test;
	while (h[i] != 'Í')
	{
		// reads a character in
		test = h[i];
		// tests if we are going to up the frequency or vice versa
		if (test == '+')
		{
			i++;
			// resets the temp index
			timespace = 0;
			for (int j = 0; j < LEN; j++) { temp[j] = '\0'; }
			// a quick loop to read in the number no matter how big
			do
			{
				// quick check to see if we are at the end of the readable data
				if (h[i] == '\0')
					break;

				temp[timespace++] = h[i++];
			} while (h[i] != ',');
			// adds the number and the operand to their respective vectors
			freq.push_back(temp);
			oper.push_back("+");
		}
		// same as if statement above but for the operand variant
		if (test == '-')
		{
			i++;
			timespace = 0;
			for (int j = 0; j < LEN; j++) { temp[j] = '\0'; }
			do
			{
				if (h[i] == '\0')
					break;

				temp[timespace++] = h[i++];
			} while (h[i] != ',');
			freq.push_back(temp);
			oper.push_back("-");
		}
		// outputs an error message if the algorithm above messes up in some way
		if (test != '-' && test != '+') { cout << "An error has occurred while reading in the data" << endl; /*system("PAUSE");*/ }
		i++;
	}
}