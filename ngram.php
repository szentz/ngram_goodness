<?php

# Ingest arguments, (1) filename and (2) max ngram considered. 
$filename = $argv[1];
$maxN = $argv[2];

# TODO -- Add defensive measures like check if file exists and is readable and that max ngram is a valid integer >= to 1 

$tokenArr = array();
$ngramHash = array();

# In reality I would read this in from a file or some data source... but would be in hash form
$stopWordsHash = array('a' => 1, 'the' => 1);

# Reads in the file, removes non alphanumeric characters and stopwords.  
function buildTokenArray($fileName) {
	global $stopWordHash;
	global $tokenArr;

	# TODO -- Cant assume we can read in to memory... should read in as buffer and loop
	# Also... should I keep numbers?  I will for now.
	$filteredText = preg_replace( "/[^a-z0-9 \n\t]/i", "", file_get_contents($fileName, 'r') or die("error message!"));

	# Tokenize on space, new lines, or tabs	
	$token = strtok("$text", " \n\t");
	while($token !== false) {
		if (!exists $stopWordsHash[$token])
			$tokenArr[] = $token;

		$token = strtok(" \n\t");
	}
}

# Loops through token array and builds n-grams, stores count in hash for sorting
function buildNGramHash($minN, $maxN) {
	global $tokenArr, $ngramHash;
	$numTokens = count($tokenArr); 

	# Koop through each token	
	for ($i = 0; $i < $numTokens; $i++) {
		$count = 0;
		# Look ahead at tokens less then maxN away		
		while($count < $maxN and $i + $count < $numTokens) {
			$ngram = implode(" ", $i, $count);
			
			#Keep track of results in hash			
			if (exists $ngramHash[$ngram)
				$ngramHash[$ngram]++;
			else
				$ngramHash[$ngram] = 1;

			$count++;
		}
	}
}			

# Custom sort algorithm.  Shorter ngrams first, then alphabetical.
function cmp($a, $b) {
	$aStrLen = strlen($a);
	$bStrLen = strlen($b);
		
	if ($aStrLen < $bStrLen)
		return -1;
	else if ($aStrLen > $bStrLen)
		return 1;
	else return strcasecmp($a, $b)
}

# Main Code:

# Need to read in file, build a token array of just what we want.
# Populates $tokenArr 
buildTokenArray($fileName);

# Process token array, build hash of ngram counts.
# Populates $ngramHash
buildNGramHash($minM, $maxM);

# Print results for now
# TODO -- Odds are Id write this to a file some data repo

uksort($ngramHash, "cmp");
foreach ($ngramHash as $ngram => $count) {
	print "$ngram $count\n";
}	 

?>