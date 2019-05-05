# Helper functions:

- safe_array(array, ...keys)
Retrieve a key from the array, when you do not know for sure that $array is really an array. Can be used with multiple levels:
safe_array(array, level1, level2, etc)

- safe_in_array(val, array)
Check if a value is in array, when you do not know for sure that $array is an array

- id_in_collection(id, collection)
Check if an ID is present in a Eloquent collection

- error(msg)
Present an error message

- success(msg)
Present a success message

- display_messages()
Display the messages in HTML