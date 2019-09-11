import csv
import sys
maxInt = sys.maxsize
decrement = True



def createCSV():
    with open('title_principals.csv','r', encoding='utf-8', newline='') as cin:
        with open('is_part_of(with category).csv','w', encoding='utf-8', newline='') as cout:

            csv_in = csv.reader(cin)
            csv_out = csv.writer(cout, delimiter=',')
            count = 0
            a = ""
            for row in csv_in:
                list = []
                list.append(row[0])
                list.append(row[2])
                if (row[3] == "category"):
                    list.append("Job")
                else:
                    list.append(row[3])

                csv_out.writerow(list)



if __name__ == "__main__":
    createCSV()