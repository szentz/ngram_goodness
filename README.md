# N-Gram Goodness

## Exercise 1:
In honor of PHP 7 releasing today... I present you an ngram solution in PHP.  I suspect you all get a lot of python and java variations, figure you might be bored with the same old same old.

With that said... I can't imagine choosing PHP for this exercise in real life but I have been writing Java code for the last year or so and wanted to mix it up.

My assumptions... Since you want to see how I think more so then anything I didnt really do any defensive programming, so I didnt do all the proper checks on script arguments.  Also assumed that we wanted to strip non alphanumeric characters.  I tokenized on spaces, new lines, and tabs cause that seemed to make sense to me.  With respect to reading in the file, I just slurped it into a string... in reality I should read it in a little at a time and in a loop, so my current code can NOT handle MASSIVE files.

Results...  As of now I am just printing to the screen, obviously you'd prefer to write this to a file or datastore of some kind.  

Execution... php ngram.php sample.txt 3

## Exercise 2:
I just went ahead and implemented stopwords logic.  Basically Id store them in some sort of hash or set then as I am building my token array Id verify that each token is not in my stop word set.  

## Exercise 3:
I am going to start this answer with, "I dont really know".  All I am completely sure of is that I would NOT keep this written in PHP.  Would probably rewrite in Python or Java and certainly would look for existing solutions that may be superior to my own.

I have never worked with anything at this scale yet so I would have a lot of questions.  My process would be something like:

1.) Ask my team if they had ideas, reach out to my network of engineers for some suggestions, research how others have solved this.

2.) Investigate how flexible and easy it would be to introduce new technologies or languages into the current enterprise solution.

3.) Experiment and learn what Apache Spark can do for me.  This seems to be gaining huge ground in large scale data processing and integrates well with Hadoop, HBase, SQl, etc...  Also allows us to write applications in various languages... Java, Python, R, etc...  This seems like a powerful and flexible solution but would require some time to come up to speed.





