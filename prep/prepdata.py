import codecs
import logging
import hashlib


def prep_researchers():
    infile = "researchers-orig.csv"
    ofile = "researchers-final.txt"
    with codecs.open(ofile, 'w', 'utf-8') as ofh:
        for line in codecs.open(infile, 'r', 'utf-8'):
            fields = line.rstrip().split(u"\t")
            if len(fields) == 4 and fields[0] != u'ORD':
                logging.debug(fields)
                hash_code = hashlib.sha1()
                hash_code.update(fields[0])
                hash_code.update(fields[1])
                hash_code.update(fields[3])
                hash_code = hash_code.hexdigest()[:8]
                fields.append(hash_code)
                ofh.write(u"\t".join(fields))
                ofh.write(u"\n")


def prep_sources():
    infile = "sources-orig.csv"
    ofile = "sources-final.txt"
    with codecs.open(ofile, 'w', 'utf-8') as ofh:
        for line in codecs.open(infile, 'r', 'utf-8'):
            fields = line.rstrip().split(u"\t")
            logging.debug(len(fields))
            if len(fields) == 11 and fields[0] != u'ORD':
                fields = line.rstrip().split(u"\t")
                ofields = [
                    fields[0],
                    fields[2],
                    fields[3],
                    fields[10],
                ]
                ofh.write(u"\t".join(ofields))
                ofh.write(u"\n")


def main():
    logging.basicConfig(level=logging.DEBUG)
    prep_researchers()
    prep_sources()

if __name__ == "__main__":
    main()
