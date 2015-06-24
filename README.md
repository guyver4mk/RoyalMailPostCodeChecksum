
Royal Mail Barcode Checksum Generator
=====================================

A PHP Class to Generate a Royal Mail Barcode Checksum, as outlined in [this] guide. 

Details on what this requires are as follows;

**6.5. Checksum character**

If you don’t use proprietary software from PIF or a Royal Mail approved co-supplier then

you’ll need to work out the checksum character yourself.

This involves using an algorithm, as described below. The checksum character is used as a

means of error detection to ensure that the rest of the barcode is correct.

***Working out the checksum character***

Checksum characters can be automatically produced through the software available from

co-suppliers. They are also available on the PIF®. They can however also be calculated by

following these steps:

**Step one**

Use the table to find row and column references for the characters in the Postcode and DPS.

Note that the sixth row/column is numbered 0 not 


  |          | 1        |   2       |    3      |      4    |      5    |       0   |
  |----------|----------|-----------|-----------|-----------|-----------|-----------|
  | **1**    | 0        | 1         | 2         |  3        | 4         |  5        |
  | **2**    | 6        | 7         | 8         |  9        | A         |  B        |
  | **3**    | C        | D         | E         |  F        | G         |  H        |
  | **4**    | I        | J         | K         |  L        | M         |  N        |
  | **5**    | O        | P         | Q         |  R        | S         |  T        |
  | **0**    | U        | V         | W         |  X        | Y         |  Z        |


For example the letter S is in row 5 and column 5. Write these down in a grid like this (we’ve

used an example Postcode of SN3 4RD and DPS of 1A), then add them up:


  |Postcode and DPS  | S | N | 3 | 4 | R | D | 1 | A |  Total |
  |-----------------:|---|---|---|---|---|---|---|---|:--------:|
  | **Row**          | 5 | 4 | 1 | 1 | 5 | 3 | 1 | 2 |  22	  |
  | **Column**       | 5 | 0 | 4 | 5 | 4 | 2 | 2 | 5 |  27	  |




**Step two**

Divide the totals by six (it is always six, no matter how many characters are in the Postcode),

and note the amount left over. In this example:

goes into 22 three times with 4 left over

6 goes into 27 four times with 3 left over

**Step three**

Refer these ‘left over’ figures back to the table, finding the character where they intersect.

For example, row 4 and column 3 gives the checksum character K.

Even if your ‘left over’ character is zero (i.e. 6 into 24 goes four times with zero left over), this

will relate to a row or column on the grid.

### General Usage Instructions

In order to use the class. Simply include the file, and create an instance of it in your application.

Then call the *ProcessPostcode()* Function with the Post Code you require the checksum for.

i.e.

***$chk = new PostCodeCheckSum();***

***$checksum = $chk-&gt;ProcessPostcode(’MK1 1ST’);***


  [this]: http://onepost.co.uk/wp-content/uploads/2013/03/OP-RM-Appendix-H.pdf