import xlrd
from tkinter import *
from tkinter import messagebox


window = Tk()
window.title("DNR Application")

w = Frame(window, width = 500, height = 200, bg = "gray")
w.pack()

x = Frame(window)
x.pack

def blackListCustomer():
    file_location = "C:/Users/Pacific Euro/Documents/DNR List.xlsx"

    workbook = xlrd.open_workbook(file_location)
    sheet = workbook.sheet_by_index(0)


    listId = []
    

    for row in range(sheet.nrows):
        listId.append((sheet.cell(row,3).value))
        
    index = 0
    for row in range(sheet.nrows):
        if sheet.cell(row,3).value == enterId.get():
            index = row

    if (enterFirstName.get() == '') and (enterLastName.get() == '') and (enterId.get() == ''):
        messagebox.showinfo("Result", "No Information is entered")
    else:
        
        if enterId.get() in listId:
            var1 = "Do not rent to " + sheet.cell(index,0).value + ' ' + sheet.cell(index,1).value + '\n' + "Reason: " + sheet.cell(index,7).value
            messagebox.showinfo ("Result", var1)
            #print ("Reason: " + sheet.cell(index,7).value)
        else:
            var2 = "You can rent to " + enterFirstName.get() + ' ' + enterLastName.get()
            messagebox.showinfo ("Result", var2)
        
        
        


firstName = Label(w, text = "What is the first name?", fg = "white", bg = "gray", font=("Helvetica", 10), padx = 10, bd = 5, width = 50)
#firstName.grid(row = 0, sticky = E)
firstName.pack()

enterFirstName = Entry(w, bd = 5, insertwidth = 1, font = 10, width = 30)
#enterFirstName.grid(row = 0, column = 1)
enterFirstName.pack()

lastName = Label(w, text = "What is the last name?", fg = "white", bg = "gray", font=("Helvetica", 10), padx = 10, bd = 5, width = 50)
#lastName.grid(row = 1, sticky = E)
lastName.pack()

enterLastName = Entry(w, bd = 5, insertwidth = 1, font = 10, width = 30)
#enterLastName.grid(row = 1, column = 1)
enterLastName.pack()

entryId = Label(w, text = "What is the Id No?", fg = "white", bg = "gray", font=("Helvetica", 10), padx = 10, bd = 5, width = 50)
#entryId.grid(row = 3, sticky = E)
entryId.pack()

enterId = Entry(w, bd = 5, insertwidth = 1, font = 10, width = 30)
#enterId.grid(row = 3, column = 1)
enterId.pack()

submit = Button(w, text = "Let's Find", bg = "blue", fg = "white", command = blackListCustomer, padx = 10, bd = 10)
#submit.grid(columnspan = 2)
submit.pack()

#result = Button(x)
#result.pack()

#result.bind('<Return>', blackListCustomer())




window.mainloop()
