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
    with open('title_basics.csv','r', encoding='utf-8', newline='') as cin:
        with open('Title.csv','w', encoding='utf-8', newline='') as cout:
                with open('ratings.csv', 'r', encoding='utf-8', newline='')as c3in:
                    basic_reader =csv.reader(cin)
                    rating_reader  = csv.reader(c3in)
                    title_writer = csv.writer(cout)
                    for (row_basic,row_rating) in zip(basic_reader,rating_reader):
                        list = []
                        list.append(row_basic[0])
                        list.append(row_basic[2])
                        list.append(row_basic[7])
                        list.append(row_basic[1])
                        list.append(row_rating[1])
                        list.append(row_rating[2])
                        title_writer.writerow(list)




if __name__ == "__main__":
    createCSV()