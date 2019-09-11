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
    with open('title_episodes.csv','r', encoding='utf-8', newline='') as cin:
        with open('Episodes.csv','w', encoding='utf-8', newline='') as cout:

            csv_in = csv.reader(cin)
            csv_out = csv.writer(cout, delimiter=',')
            for row in csv_in:
                count = 0
                list = []
                while count <=3:
                    list.append(row[count])
                    count +=1
                csv_out.writerow(list)


if __name__ == "__main__":
    createCSV()