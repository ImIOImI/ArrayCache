# ArrayCache
Stupid simple class capable of creating php files that return arrays.

This is a very basic class that just saves arrays in a file that return said array. I created this class primarily because I'm exceedingly lazy, and I wanted to go through as minimum of an effort as possible to save and retrieve config values. 

Ultimately, I think that if you need a way to store data that will not be written very often, that's lightning fast to access, who's data can be version controlled, you don't want the extra overhead of having a db connection, and/or you don't want to json_decode or unserialize your data to stick it into an array, then this class may be for you.
