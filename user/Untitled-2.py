import matplotlib.pyplot as plt

print("=== Virtual Lab ===")
print("Electrochemical Equivalent of Copper\n")

print("1. Find Z")
print("2. Find m")
print("3. Find I")
print("4. Find t")

choice = input("Enter your choice: ")

# ===== FIND Z =====
if choice == "1":
    m = float(input("Enter mass: "))
    I = float(input("Enter current: "))
    t = float(input("Enter time: "))
    
    Z = m / (I * t)
    print("Z =", Z)

# ===== FIND m =====
elif choice == "2":
    Z = float(input("Enter Z: "))
    I = float(input("Enter current: "))
    t = float(input("Enter time: "))
    
    m = Z * I * t
    print("Mass =", m)

# ===== FIND I =====
elif choice == "3":
    Z = float(input("Enter Z: "))
    m = float(input("Enter mass: "))
    t = float(input("Enter time: "))
    
    I = m / (Z * t)
    print("Current =", I)

# ===== FIND t =====
elif choice == "4":
    Z = float(input("Enter Z: "))
    m = float(input("Enter mass: "))
    I = float(input("Enter current: "))
    
    t = m / (Z * I)
    print("Time =", t)

else:
    print("Wrong choice")

# ===== GRAPH (VERY SIMPLE) =====

print("\nNow Graph will be shown")

# simple values
time = [10, 20, 30, 40, 50]

# agar Z na ho to user se le lo
if 'Z' not in locals():
    Z = float(input("Enter Z for graph: "))

if 'I' not in locals():
    I = float(input("Enter current for graph: "))

# calculate mass
mass1 = []
for t in time:
    mass1.append(Z * I * t)

# standard graph (fixed value)
Z_std = 0.000329
mass2 = []
for t in time:
    mass2.append(Z_std * I * t)

# graph
plt.plot(time, mass1)
plt.plot(time, mass2)

