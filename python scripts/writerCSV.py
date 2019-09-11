import csv
import sys
maxInt = sys.maxsize
decrement = True

while decrement:
    # decrease the maxInt value by factor 10
    # as long as the OverflowError occurs.

    decrement = False
    try:
        csv.field_size_limit(maxInt)
    except OverflowError:
        maxInt = int(maxInt/10)
        decrement = True


def createCSV():
    with open('title_crew.csv','r', encoding='utf-8', newline='') as cin:
        with open('writers(no NULL).csv','w', encoding='utf-8', newline='') as cout:

            csv_in = csv.reader(cin)
            csv_out = csv.writer(cout, delimiter=',')
            count = 0
            a = '\\N'
            for row in csv_in:
                list2 = row[2].split(',')
                count += 1
                for i in range(len(list2)):
                    if list2[i] != a:
                        list = []
                        list.append(row[0])
                        list.append(list2[i])
                        csv_out.writerow(list)


if __name__ == "__main__":
    createCSV()