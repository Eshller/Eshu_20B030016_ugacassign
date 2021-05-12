import sqlite3

conn= sqlite3.connect('data.db')

cur = conn.cursor()
# TO CREATE A TABLE IN DATABASE
    # cur.execute("""CREATE TABLE data (
    #     Name text,
    #     Password text
    # )
    # """)

def login():
    name = input("Enter Your name to Login: ")
    password = input("Enter your pass: ")
    sql_query=("SELECT * FROM data WHERE Name= ? AND Password = ?")
    cur.execute(sql_query,[(name),(password)])
    results = cur.fetchall()
        
    if results:
        for i in results:
            print("Successfully Login\n")
            print(" Hi there "+i[0]+ "\n")
    else:
        print("Not Found!")
while True:
    ans=input("Press \n 1 To Register \n 2 To Login \n 3 To Print\n")
    if(ans=="1"):
        name = input("Enter Your name: ")
        password = input("Enter your pass: ")
        cur.execute("INSERT INTO data VALUES ('"+name+"','"+password+"')")
        print("Details added...\n")
    elif(ans=="2"):
        login()
    elif(ans=="3"):
        cur.execute("SELECT * FROM data")
        print(cur.fetchall())
        conn.commit()
    else:
        exit()
conn.close()