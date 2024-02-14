import os
import shutil
import tkinter as tk
from tkinter import filedialog
from tkinter import messagebox
from tkinter import ttk

class FileMoverApp:
    def __init__(self, root):
        self.root = root
        self.root.title("File Mover")

        # Create left and right frames
        self.left_frame = ttk.LabelFrame(self.root, text="Source Folder")
        self.left_frame.grid(row=0, column=0, padx=10, pady=10, sticky="nsew")

        self.right_frame = ttk.LabelFrame(self.root, text="Destination Folder")
        self.right_frame.grid(row=0, column=1, padx=10, pady=10, sticky="nsew")

        # Initialize the directory history as a list
        self.dir_history = []

        # Define a set of predefined folder names
        self.predefined_folders = {
            "alert", "avatar", "department", "events", "files",
            "groupChatFiles", "groupProfile", "shops", "test_document", "upload", "uploads"
        }

        

        # Create treeviews to display files in both folders
        self.source_tree = ttk.Treeview(self.left_frame, selectmode='extended', columns=("Name", "Type"), show="headings")
        self.source_tree.heading("Name", text="Name")
        self.source_tree.heading("Type", text="Type")

        # Add a vertical scrollbar to the source tree
        self.source_scroll = ttk.Scrollbar(self.left_frame, orient="vertical", command=self.source_tree.yview)
        self.source_tree.configure(yscrollcommand=self.source_scroll.set)
        self.source_scroll.pack(side="right", fill="y")
        self.source_tree.pack(side="left", fill="both", expand=True)

        self.source_tree.bind('<Double-1>', self.on_item_double_click)  # Bind the double-click event

        # Repeat the process for the destination tree
        self.dest_tree = ttk.Treeview(self.right_frame, selectmode='extended', columns=("Name", "Type"), show="headings")
        self.dest_tree.heading("Name", text="Name")
        self.dest_tree.heading("Type", text="Type")

        # Add a vertical scrollbar to the destination tree
        self.dest_scroll = ttk.Scrollbar(self.right_frame, orient="vertical", command=self.dest_tree.yview)
        self.dest_tree.configure(yscrollcommand=self.dest_scroll.set)
        self.dest_scroll.pack(side="right", fill="y")
        self.dest_tree.pack(side="left", fill="both", expand=True)

        # Create buttons to select folders, move files, and go back
        self.select_all_button = ttk.Button(self.left_frame, text="Select All Folders", command=self.select_all_folders)
        self.select_all_button.pack(padx=10, pady=5, fill="x")

        self.select_source_button = ttk.Button(self.left_frame, text="Select Source Folder", command=self.select_source_folder)
        self.select_source_button.pack(padx=10, pady=5, fill="x")

        self.back_button = ttk.Button(self.left_frame, text="Go Back", command=self.go_back)
        self.back_button.pack(padx=10, pady=5, fill="x")

        self.select_dest_button = ttk.Button(self.right_frame, text="Select Destination Folder", command=self.select_dest_folder)
        self.select_dest_button.pack(padx=10, pady=5, fill="x")

        self.move_button = ttk.Button(self.root, text="Move Selected Files", command=self.move_files)
        self.move_button.grid(row=1, column=0, columnspan=2, padx=10, pady=10)

        # Set the initial source folder to a fixed path and populate the directory history
        self.source_folder = r"C:\xampp3\htdocs\latest\TOS\includes\Pages"
        self.dest_folder = self.source_folder.replace("TOS", "NEWTOS")
        if not os.path.exists(self.dest_folder):
            try:
                os.makedirs(self.dest_folder)
            except OSError as e:
                messagebox.showerror("Error", f"Error creating destination folder: {e}")

        self.dir_history.append(self.source_folder)
        self.source_path_label = ttk.Label(self.left_frame, text=self.source_folder)
        self.source_path_label.pack(padx=10, pady=5)

        self.dest_path_label = ttk.Label(self.right_frame, text=self.dest_folder)
        self.dest_path_label.pack(padx=10, pady=5)


        # Populate the source tree with the initial directory
        self.populate_tree(self.source_tree, self.source_folder)

    def select_all_folders(self):
        self.source_tree.selection_set(self.source_tree.get_children())

    def on_item_double_click(self, event):
        item = self.source_tree.selection()[0]  # Get the selected item
        name, item_type = self.source_tree.item(item, 'values')
        folder_path = os.path.join(self.dir_history[-1], name)
        if item_type == "Folder":
            self.populate_subtree(self.source_tree, folder_path)

    def populate_tree(self, tree, folder_path):
        tree.delete(*tree.get_children())  # Clear existing items
        if not folder_path:  # Exit if folder_path is empty
            return
        try:
            for item in os.listdir(folder_path):
                if item.lower() in (name.lower() for name in self.predefined_folders) and os.path.isdir(os.path.join(folder_path, item)):
                    tree.insert("", "end", values=(item, "Folder"))
        except Exception as e:
            print(f"Error: {e}")

    def populate_subtree(self, tree, folder_path):
        tree.delete(*tree.get_children())  # Clear existing items
        if not folder_path:  # Exit if folder_path is empty
            return
        try:
            for item in os.listdir(folder_path):
                item_path = os.path.join(folder_path, item)
                if os.path.isdir(item_path):
                    tree.insert("", "end", values=(item, "Folder"))
                elif os.path.isfile(item_path):
                    tree.insert("", "end", values=(item, "File"))
            # Update the directory history
            if folder_path not in self.dir_history:  # Avoid duplicate entries
                self.dir_history.append(folder_path)
        except Exception as e:
            print(f"Error: {e}")

    def select_source_folder(self):
        folder_selected = filedialog.askdirectory(initialdir=self.source_folder, title="Select Source Folder")
        if folder_selected:
            self.source_folder = folder_selected
            self.dir_history = [self.source_folder]  # Reset history to new source
            self.populate_tree(self.source_tree, self.source_folder)

    
    def select_dest_folder(self):
     folder_selected = filedialog.askdirectory(title="Select Destination Folder")
     if folder_selected:
        # Create 'includes' and 'Pages' directories within the selected destination
        self.dest_folder = os.path.join(folder_selected, "includes", "Pages")
        if not os.path.exists(self.dest_folder):
            try:
                os.makedirs(self.dest_folder)
            except OSError as e:
                messagebox.showerror("Error", f"Error creating destination folder: {e}")
                return
        self.dest_path_label['text'] = self.dest_folder  # Update the label
        self.populate_tree(self.dest_tree, self.dest_folder)



    def move_files(self):
        if not self.dest_folder:
            messagebox.showwarning("Warning", "Destination folder is not selected.")
            return

        moved_files = []
        for item in self.source_tree.selection():
            name, item_type = self.source_tree.item(item, 'values')
            src_path = os.path.join(self.dir_history[-1], name)
            dest_path = os.path.join(self.dest_folder, name)
            try:
                shutil.move(src_path, dest_path)
                moved_files.append(name)
            except Exception as e:
                messagebox.showerror("Error", f"Error moving {item_type.lower()} '{name}': {e}")
                continue

        # After moving, refresh the source and destination trees
        self.populate_tree(self.source_tree, self.dir_history[-1])
        self.populate_tree(self.dest_tree, self.dest_folder)

        # Display a message box with the result
        if moved_files:
            messagebox.showinfo("Success", f"Moved {len(moved_files)} files/folders successfully.")

    def go_back(self):
        if len(self.dir_history) > 1:
            self.dir_history.pop()  # Go back to the previous directory
            previous_folder = self.dir_history[-1]
            self.populate_tree(self.source_tree, previous_folder)

if __name__ == "__main__":
    root = tk.Tk()
    app = FileMoverApp(root)
    root.mainloop()
