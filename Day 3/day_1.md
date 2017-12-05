Alright so I worked a little bit with Manhattan distance when I took baby's first set theory in college, but I've never encountered it in a "computational" setting, if you will.

???--------------???
-
-
-        1
-
-
???--------------???

I did not build the spiral by hand, lmao. I knew that I needed to find the distance of my number from the center, `1` ((0,0) if you will). I could tell from the small sample they gave (I extended by 1 layer to confirm) that for every complete square, the bottom right number was an odd number square (so 1, 9, 25, 49, etc). Therefore, knowing my number, `289326`, I knew what size my square was.

The next square up from 289326 was 539^2, or 290521.

- I accidentally used the smaller square first... whoops

???--------------???
-
-
-        1
-
-
???--------------290521

From there, it was a matter of subtracting (length-1) from the square to get each of the 4 "corners".

- That feel when you kept on accidentally subtracting by length every time until the last time

289445--------------288907
-
-
-        1
-
-
289983--------------290521

Now, I know where my number lives :o

   289326
     v
289445--------------288907
-
-
-        1
-
-
289983--------------290521

Also, the y-coordinate of my value is (x, ((539-1)/2), so (x, 269)

Now, time to get the x-coordinate by finding the distance between my number and the "middle" of the "top" of my spiral

   289326  289176
     v     v
289445--------------288907
-
-
-        1
-
-
289983--------------290521

Subtract my number from the mid-way point and I get 150, so my coordinates are (150,269). Add them up and I got 419!

*I have zero idea how to turn this into an actual "script", tbh.*
