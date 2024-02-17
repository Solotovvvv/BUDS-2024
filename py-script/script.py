import sys
import json

def get_top_10_businesses(json_file_path):
    # Read the JSON data from the file
    with open(json_file_path, 'r') as file:
        json_data = file.read()

    # Now you can parse the JSON data
    try:
        data = json.loads(json_data)
        # Sort businesses by average rating in descending order
        sorted_data = sorted(data, key=lambda x: x['average_rating'], reverse=True)
        # Get the top 10 businesses
        top_10_businesses = sorted_data[:10]
        # Convert the top 10 businesses to JSON format
        top_10_json = json.dumps(top_10_businesses, indent=2)
        return top_10_json
    except json.JSONDecodeError as e:
        return f"Error decoding JSON data: {e}"

# Check if the correct number of command-line arguments is provided
if len(sys.argv) != 2:
    print("Usage: script.py <path_to_json_file>")
    sys.exit(1)

# Get the path to the JSON file from the command-line arguments
json_file_path = sys.argv[1]

# Call the function to get the top 10 businesses
result = get_top_10_businesses(json_file_path)

# Print or return the result as needed
print(result)
