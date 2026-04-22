# Virtual Lab: Electrochemical Equivalent of Copper
matplotlib.pyplot # type: ignore
print("===== VIRTUAL LAB =====")
print("Experiment: To determine Electrochemical Equivalent of Copper\n")

# Input lena
initial_mass = float(input("Enter initial mass (g): "))
final_mass = float(input("Enter final mass (g): "))
current = float(input("Enter current (A): "))
time = float(input("Enter time (s): "))

# Calculation
mass = final_mass - initial_mass
Z = mass / (current * time)

# Output
print("\n===== RESULT =====")
print("Mass deposited =", mass)
print("ECE (Z) =", Z)

# Simple Graph
import matplotlib.pyplot as plt

time_values = [10, 20, 30, 40, 50]
mass_values = []

for t in time_values:
    m = current * t * Z
    mass_values.append(m)

plt.plot(time_values, mass_values)
plt.xlabel("Time (s)")
plt.ylabel("Mass (g)")
plt.title("Mass vs Time Graph")
plt.show()