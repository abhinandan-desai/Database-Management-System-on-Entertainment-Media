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
with open('data.tsv', 'r', encoding='utf-8', newline='') as fin, \
    open('ratings.csv', 'w', encoding='utf-8', newline='') as fout:  # f output

    reader = csv.reader(fin, dialect='excel-tab')
    writer = csv.writer(fout, delimiter=',')  # here without a dialect, explicitly
    for row in reader:
         writer.writerow(row)

