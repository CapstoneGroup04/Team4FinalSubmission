import mysql.connector

def connect_to_db():
    # Create a connection to the MySQL database
    mydb = mysql.connector.connect(
      host="localhost",
      user="yourusername",
      password="yourpassword",
      database="yourdatabase"
    )

    # Check if the connection was successful
    if mydb.is_connected():
      print("Connected to the MySQL database!")
    else:
      print("Failed to connect to the MySQL database.")

    return mydb
